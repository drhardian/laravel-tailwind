<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Prodin;
use Illuminate\Http\Request;
use App\Models\Inventory\Prodout;
use App\Models\InventoryProductoutTransaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class ProdoutController extends Controller
{
    protected $pageTitle;
    protected $pageProfile;

    public function __construct()
    {
        $this->pageTitle = 'Stock Product Out';
        $this->pageProfile = 'Stock Product Out';
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

        return view('inventory.prodout.index', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageTitle
        ]);
    }

    # Create
    public function create()
    {
        $breadcrumbs = [
            [
                'title' => 'Overview',
                'status' => 'active',
                'url' => route('inventory.prodout.index'),
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => 'New Product Out',
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('inventory.prodout.create', [
            'breadcrumbs' => $breadcrumbs,
            'title' => 'New Product Out'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
             /**
             * Handle upload image
             */
            if ($file = $request->file('prodout_image')) {
                $fileName = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();
                $path = 'public/assets/img/invproductin';
                /**
                 * Upload an image to Storage
                 */
                $file->storeAs($path, $fileName);
                $fileName = 'storage/assets/img/invproductout/' . $fileName;
                $validatedData['prodout_image'] = $fileName;
            }

            $prodout = Prodout::create(
                array_merge(
                    [
                        'prodout_image' => $fileName
                    ],
                $request->only('prodout_image','prodout_origin','prodout_noref','prodout_code','prodout_owner','prodout_name','prodout_supplier','prodout_brand','prodoutstock_loc','prodout_category','prodout_uom','prodout_remstock','prodout_stock','prodout_spec', 'date_out', 'prodout_price', 'prodout_status')
                )
            );

            DB::commit();

            return response()->json([
                'message' => 'Product Out has been created!'
            ], 200);

            // return response()->json([
            //     'url' => route('eprocfbo.show', [$eprocfbo->id])
            // ], 200);

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
    public function show(Prodout $prodout)
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
                'url' => route('inventory.prodout.index'),
                'icon' => '',
            ],
            [
                'title' => $this->pageProfile,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('inventory.prodout.profile', [
            'breadcrumbs' => $breadcrumbs,
            'title' => $this->pageProfile,
            'prodout' => $prodout
        ]);
    }

    public function loadprofilefromitemcode()
    {
        $prodIn = Prodin::where('itemcode',request('itemcode'))->first();

        return response()->json([
            // 'prodout_image' => $prodIn->prodin_image,
            'prodout_owner' => $prodIn->inv_owner,
            'prodout_name' => $prodIn->prod_name,
            'prodout_supplier' => $prodIn->inv_supplier,
            'prodout_brand' => $prodIn->inv_brand,
            'prodoutstock_loc' => $prodIn->stock_loc,
            'prodout_category' => $prodIn->inv_category,
            'prodout_remstock' => $prodIn->inv_stock,
            'prodout_uom' => $prodIn->inv_uom,
            'prodout_spec' => $prodIn->inv_spec,
            'prodout_price' => $prodIn->inv_price,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodout $prodout)
    {
        return response()->json([
            'dropdown' => [
                'prodout_uom' => $prodout->prodout_uom,
                'prodoutstock_loc' => $prodout->prodoutstock_loc,
                'prodout_owner' => $prodout->prodout_owner,
                'prodout_status' => $prodout->prodout_status,
            ],
            'form' => [
                ['prodout_code', $prodout->prodout_code],
                ['prodout_origin', $prodout->prodout_origin],
                ['prodout_noref', $prodout->prodout_noref],
                ['prodout_owner', $prodout->prodout_owner],
                ['prodout_name', $prodout->prodout_name],
                ['prodout_supplier', $prodout->prodout_supplier],
                ['prodout_brand', $prodout->prodout_brand],
                ['prodout_category', $prodout->prodout_category],
                ['prodout_remstock', $prodout->prodout_remstock],
                ['prodout_stock', $prodout->prodout_stock],
                ['prodout_spec', $prodout->prodout_spec],
                ['date_out', Carbon::parse($prodout->date_out)->format('d/m/Y')],
                ['prodout_price', $prodout->prodout_price],
            ],
            'update_url' => route('inventory.prodout.update', ['prodout' => $prodout->id])
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodout $prodout)
    {
        DB::beginTransaction();

        try {

            if ($file = $request->file('prodout_image')) {
                $fileName = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
                $path = 'public/assets/img/invproductout/';

                /**
                 * Delete photo if exists.
                 */
                if($prodout->prodout_image){
                    $result = str_replace('storage/', '', $prodout->prodout_image);
                    Storage::delete('public/' . $result);
                }

                /**
                 * Store an image to Storage
                 */
                $file->storeAs($path, $fileName);
                $fileName = 'storage/assets/img/invproductout/'.$fileName;
                $validatedData['prodout_image'] = $fileName;
            }
            Prodout::where('id', $prodout->id)->update(
                [
                    'prodout_image' => $fileName
                ],
            $request->only('prodout_image','prodout_origin','prodout_noref','prodout_code','prodout_owner','prodout_name','prodout_supplier','prodout_brand','prodoutstock_loc','prodout_category','prodout_uom','prodout_remstock','prodout_stock','prodout_spec', 'date_out', 'prodout_price', 'prodout_status')
            );

            DB::commit();

            return response()->json([
                'message' => 'Product Out successfully updated'
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
    public function destroy(Prodout $prodout)
    {
        DB::beginTransaction();

        try {
            if($prodout->prodout_image){
                $result = str_replace('storage/', '', $prodout->prodout_image);
                    Storage::delete('public/' . $result);
            }

            Prodout::destroy($prodout->id);

            DB::commit();

            return response()->json([
                'message' => 'Product Out successfully deleted'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'The server encountered an error and could not complete your request'
            ], 500);
        }
    }

    // public function uploadSrf(Request $request)
    // {
    //     $request->validate([
    //         'upload_srf' => 'required|mimes:pdf,doc,docx|max:2048',
    //     ]);

    //     if ($request->hasFile('upload_srf')) {
    //         $file = $request->file('upload_srf');
    //         $fileName = time() . '_' . $file->getClientOriginalName();
    //         $filePath = $file->storeAs('upload_srfs', $fileName); // Simpan file di direktori 'upload_srfs'

    //         // Simpan informasi dokumen ke tabel 'upload_srf'
    //         $uploadSrf = new UploadSrf();
    //         $uploadSrf->name = $fileName;
    //         $uploadSrf->file_path = $filePath;
    //         $uploadSrf->save();

    //         return redirect()->back()->with('success', 'Certificate document uploaded successfully.');
    //     }

    //     return redirect()->back()->with('error', 'Failed to upload certificate document.');
    // }

     /**
     * EXPORT EXCEL
     */
    // public function exportExcel()
    // {
    //     return Excel::download(new PsvdatamasterExport, 'psvdatamaster_data.xlsx');
    //     // return redirect()->back()->with('success', 'Data exported successfully');

    // }

    //  /**
    //  * IMPORT EXCEL
    //  */
    // public function importExcel(Request $request)
    // {
    //     try {
    //         Excel::import(new PsvdatamasterImport, $request->file('filexls'));

    //         return response()->json([
    //             'message' => 'Data imported successfully'
    //         ], 200);
    //     } catch (ParseError $e) {
    //         return response()->json([
    //             'message' => $e->getMessage()
    //         ], 500);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'message' => $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function showDatatable()
    {
        $model = InventoryProductoutTransaction::with('requestedBy')->with('approvedBy');

        return DataTables::of($model)
            ->addColumn('actions', function($model) {
                $show = '<a href="'.route('inventory.prodout.show', [ $model->id ]).'"><i class="fa-solid fa-eye cursor-pointer"></i></a>';
                $edit = '<a href="#" class="px-2" onclick="editRecord(\'' . route('inventory.prodout.edit', ['prodout' => $model->id]) . '\')"><i class="fa-solid fa-pen-to-square cursor-pointer"></i></a>';
                $delete = '<a href="#" class="" onclick="deleteRecord(\'' . route('inventory.prodout.destroy', ['prodout' => $model->id]) . '\')"><i class="fa-solid fa-trash cursor-pointer"></i></a>';
                $actions = '<div class="row flex">'.
                    $show.$edit.$delete.
                    '</div>';

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

}
