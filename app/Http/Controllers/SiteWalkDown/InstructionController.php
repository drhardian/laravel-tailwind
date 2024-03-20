<?php

namespace App\Http\Controllers\SiteWalkDown;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteWalkDown\InstructionStoreRequest;
use App\Interfaces\AreaRepositoryInterface;
use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\InstructionRepositoryInterface;
use App\Interfaces\OtherAreaRepositoryInterface;
use App\Models\SiteWalkDown\Area;
use App\Models\SiteWalkDown\Company;
use App\Models\SiteWalkDown\Instruction;
use App\Models\SiteWalkDown\InstructionOtherarea;
use App\Models\SiteWalkDown\InstructionPerson;
use App\Models\SiteWalkDown\InstructionTagnum;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class InstructionController extends Controller
{
    private InstructionRepositoryInterface $instructionRepository;
    private CompanyRepositoryInterface $companyRepository;
    private AreaRepositoryInterface $areaRepository;
    private OtherAreaRepositoryInterface $otherAreaRepository;
    protected $pageTitle;

    public function __construct(InstructionRepositoryInterface $instructionRepository, CompanyRepositoryInterface $companyRepository, AreaRepositoryInterface $areaRepository, OtherAreaRepositoryInterface $otherAreaRepository)
    {
        $this->instructionRepository = $instructionRepository;
        $this->companyRepository = $companyRepository;
        $this->areaRepository = $areaRepository;
        $this->otherAreaRepository = $otherAreaRepository;
        $this->pageTitle = 'SiteWalkdown Instruction';
    }

    # Display a listing of the resource.
    public function index()
    {
        // abort_unless(Gate::allows('instruction_access'), 403);
        $title = $this->pageTitle;

        $breadcrumbs = [
            [
                'title' => 'Instruction',
                'status' => 'active',
                'url' => route('swd.instructions.index'),
                'icon' => 'fa-solid fa-house fa-sm',
            ],
        ];

        return view('sitewalkdown.instruction.index', compact('breadcrumbs', 'title'));
    }

    # Show the form for creating a new resource.
    public function create()
    {
        // abort_unless(Gate::allows('instruction_create'), 403);

        $title = $this->pageTitle;

        $breadcrumbs = [
            [
                'title' => 'Instruction',
                'status' => 'active',
                'url' => route('swd.instructions.index'),
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => 'New',
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];

        return view('sitewalkdown.instruction.create', compact('breadcrumbs', 'title'));
    }

    # Store a newly created resource in storage.
    public function store(InstructionStoreRequest $request)
    {
        // abort_unless(Gate::allows('instruction_create'), 403);

        DB::beginTransaction();

        try {
            if ($request->validated()) {
                $this->instructionRepository->createInstruction($request);
            }

            DB::commit();

            session()->flash('success', __('formprocess.instruction.store.success'));

            $url = $request->nextPage == 0 ? route('swd.instructions.index') : route('swd.assessments.index');

            return response()->json(
                [
                    'url' => $url,
                ],
                200,
            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json(
                [
                    'message' => __('formprocess.instruction.store.failed'),
                ],
                500,
            );
        }
    }

    # Display the specified resource.
    public function show($id)
    {
        abort_unless(Gate::allows('instruction_view'), 403);
    }

    # Show the form for editing the specified resource.
    public function edit(Instruction $instruction)
    {
        // abort_unless(Gate::allows('instruction_edit'), 403);

        $title = $this->pageTitle;

        $breadcrumbs = [
            [
                'title' => 'Instruction',
                'status' => 'active',
                'url' => route('swd.instructions.index'),
                'icon' => 'fa-solid fa-house fa-sm',
            ],
            [
                'title' => 'Edit '.$instruction->instruction_num,
                'status' => '',
                'url' => '',
                'icon' => '',
            ],
        ];
        $attributes = (object) [
            'title' => 'Instructions',
            'breadcrumb' => (object) [(object) ['title' => 'Dashboard', 'status' => '', 'previousUrl' => '/'], (object) ['title' => 'Instructions', 'status' => '', 'previousUrl' => route('swd.instructions.index')], (object) ['title' => 'Edit', 'status' => 'active', 'previousUrl' => '']],
            'formTitle' => 'EDIT INSTRUCTION',
        ];

        $company = [$instruction->company_id, $this->companyRepository->getNameById($instruction->company_id)];
        $area = [$instruction->area_id, $this->areaRepository->getTitleById($instruction->area_id)];

        $otherarea = [];
        $otherAreas = InstructionOtherarea::with('otherarea:id,title')
            ->where('instruction_id', $instruction->id)
            ->get();
        foreach ($otherAreas as $value) {
            $otherarea[] = [$value->otherarea_id, $this->otherAreaRepository->getTitleById($value->otherarea_id)];
        }

        $tagnums = [];
        $tagNumbers = InstructionTagnum::select('tagnumber')
            ->where('instruction_id', $instruction->id)
            ->get();
        foreach ($tagNumbers as $value) {
            $tagnums[] = $value->tagnumber;
        }

        $engineers = [];
        $people = InstructionPerson::with('user_account:username,name')
            ->where('instruction_id', $instruction->id)
            ->get();
        foreach ($people as $value) {
            $engineers[] = [$value->user_account->username => $value->user_account->name];
        }

        $dateRange = [
            'startDate' => Carbon::parse($instruction->date_activity_start)->format('d/m/Y'),
            'endDate' => Carbon::parse($instruction->date_activity_end)->format('d/m/Y'),
        ];

        return view('sitewalkdown.instruction.edit', compact('breadcrumbs', 'title','instruction', 'attributes', 'company', 'area', 'otherarea', 'tagnums', 'engineers', 'dateRange'));
    }

    # Update the specified resource in storage.
    public function update(InstructionStoreRequest $request, Instruction $instruction)
    {
        // abort_unless(Gate::allows('instruction_edit'), 403);

        DB::beginTransaction();

        try {
            if ($request->validated()) {
                $this->instructionRepository->updateInstruction($request, $instruction);
            }

            DB::commit();

            session()->flash('success', __('formprocess.instruction.update.success'));

            return response()->json(
                [
                    'url' => route('swd.instructions.index'),
                ],
                200,
            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json(
                [
                    'message' => __('formprocess.instruction.update.failed'),
                ],
                500,
            );
        }
    }

    # Remove the specified resource from storage.
    public function destroy(Instruction $instruction)
    {
        // abort_unless(Gate::allows('instruction_delete'), 403);

        DB::beginTransaction();

        try {
            $instruction->delete();

            DB::commit();

            return response()->json(
                [
                    'message' => __('formprocess.instruction.destroy.success'),
                ],
                200,
            );
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json(
                [
                    'message' => __('formprocess.instruction.destroy.failed'),
                ],
                500,
            );
        }
    }

    # Display a listing of the resource on datatable.
    public function showRowsOnTable()
    {
        $actionBtn = request('actionBtn');

        $query = Instruction::with('company:id,name', 'area');

        return DataTables::of($query, $actionBtn)
            ->addColumn('instruction_num', function ($query) use ($actionBtn) {
                if ($actionBtn == 1) {
                    return '<a class="btn btn-sm btn-orange mr-2" href="' . route('swd.assessments.create', ['id' => $query->id]) . '"><i class="fa-solid fa-right-to-bracket"></i></a>' . $query->instruction_num;
                } else {
                    return $query->instruction_num;
                }
            })
            ->addColumn('companyname', function ($query) {
                return $query->company->name;
            })
            ->addColumn('areaname', function ($query) {
                return $query->area->title;
            })
            ->addColumn('subarea', function ($query) {
                $otherAreas = InstructionOtherarea::with('otherarea:id,title')
                    ->where('instruction_id', $query->id)
                    ->get();

                $listOtherArea = '';
                foreach ($otherAreas as $area) {
                    $listOtherArea = $listOtherArea . '<span class="badge badge-default mr-1">' . $area->otherarea->title . '</span>';
                }

                return $listOtherArea;
            })
            ->addColumn('tagnumber', function ($query) {
                $tagNumbers = InstructionTagnum::select('tagnumber')
                    ->where('instruction_id', $query->id)
                    ->get();

                $listTagnum = '';
                foreach ($tagNumbers as $tagnum) {
                    $listTagnum = $listTagnum . '<span class="badge badge-default mr-1">' . $tagnum->tagnumber . '</span>';
                }

                return $listTagnum;
            })
            ->addColumn('instruction_status', function ($query) {
                $spanColor = $query->status == true ? 'badge-success' : 'badge-danger';
                $spanText = $query->status == true ? 'Complete' : 'Pending';

                return '<span class="badge ' . $spanColor . '">' . $spanText . '</span>';
            })
            ->addColumn('instruction_period', function ($query) {
                return Carbon::parse($query->date_activity_start)->format('d/m/Y') . ' - ' . Carbon::parse($query->date_activity_end)->format('d/m/Y');
            })
            ->addColumn('engineers', function ($query) {
                $engineers = InstructionPerson::with('user_account:username,name')
                    ->where('instruction_id', $query->id)
                    ->get();

                $listEngineer = '';
                foreach ($engineers as $engineer) {
                    $listEngineer = $listEngineer . '<span class="badge badge-default mr-1">' . $engineer->user_account->name . '</span>';
                }

                return $listEngineer;
            })
            ->addColumn('actions', function ($query) use ($actionBtn) {
                if ($actionBtn == 1) {
                    return '';
                } else {
                    return '<a href="' . route('swd.instructions.edit', $query->id) . '"><i class="fa-solid fa-pen-to-square text-gray-400 cursor-pointer mr-2" title="Edit"></i></a>' . '<i class="fa-solid fa-trash-can text-gray-400 cursor-pointer mr-2" title="Delete" onclick="deleteInstruction(\'' . route('swd.instructions.destroy', $query->id) . '\')"></i>' . '<a href="' . route('swd.reporting.pdf', ['id' => $query->id, 'companyid' => $query->company->id, 'productid' => null]) . '" target="_blank">' . '<i class="fa-solid fa-folder-open text-gray-400 cursor-pointer" title="Show"></i>' . '</a>';
                }
            })
            ->addColumn('notes', function ($query) use ($actionBtn) {
                if ($actionBtn == 1) {
                    return $query->notes;
                } else {
                    return '';
                }
            })
            ->rawColumns(['actions', 'instruction_status', 'instruction_period', 'engineers', 'subarea', 'tagnumber', 'instruction_num'])
            ->make(true);
    }

    /**
     * Display a listing of the resource on selectbox.
     *
     * @return \Illuminate\Http\Response
     */
    public function usersOnSelectbox()
    {
        $queries = User::select('name', 'username')->get();

        $response = [];

        foreach ($queries as $query) {
            $response[] = [
                'id' => $query->username,
                'text' => $query->name,
            ];
        }

        return response()->json($response);
    }
}
