<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;
use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Customers';
        $this->pageProfile = 'Profile';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => 'active',
                'url' => 'dashboard',
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => $this->pageTitle,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('request_order.customer.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientStoreRequest $request)
    {
        DB::beginTransaction();

        try {
            $client = Client::create($request->only('name','address','phone_number','email'));
            
            DB::commit();

            return response()->json([
                'url' => route('client.show', [$client->id])
            ], 200);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            DB::rollBack();

            return response()->json([
                'error' => 'error'
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $breadcrumbs = [
            [
                'title' => 'Dashboard',
                'status' => 'active',
                'url' => 'dashboard',
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => $this->pageTitle,
                'status' => 'active',
                'url' => route('client.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        $contracts = ContractController::showAsCards($client->id);

        return view('request_order.customer.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'customer' => $client,
            'contracts' => $contracts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return response()->json([
            'form' => [
                ['name', $client->name],
                ['address', $client->address],
                ['phone_number', $client->phone_number],
                ['email', $client->email],
            ],
            'update_url' => route('client.update', ['client' => $client->id])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientStoreRequest $request, Client $client)
    {
        DB::beginTransaction();

        try {
            $client->update($request->only('name','address','phone_number','email'));

            DB::commit();

            return response()->json([
                'message' => 'Customer successfully updated'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        DB::beginTransaction();

        try {
            $client->delete();

            DB::commit();

            return response()->json([
                'message' => 'Customer successfully deleted'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    public function showDatatable()
    {
        $model = Client::with('contracts')
        ->select(
            'id',
            'name',
            'address',
            'phone_number',
            'email',
            'updated_at'
        );

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $show = '<a href="'.route('client.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('client.edit', ['client' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = $model->contracts->count() == 0 ? '<a href="#" class="" onclick="deleteRecord(\'' . route('client.destroy', ['client' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>' : '';
                $actions = '<div class="row flex">'.
                    $show.$edit.$delete.
                    '</div>';

                return $actions;
            })
            ->editColumn('updated_at', function($model) {
                return Carbon::parse($model->updated_at)->format('d/m/Y H:i:s');
            })
            ->rawColumns(['actions'])
            ->removeColumn('contracts')
            ->make(true);
    }
}
