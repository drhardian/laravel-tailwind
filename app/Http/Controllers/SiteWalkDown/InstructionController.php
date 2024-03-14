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

    public function __construct(
        InstructionRepositoryInterface $instructionRepository,
        CompanyRepositoryInterface $companyRepository,
        AreaRepositoryInterface $areaRepository,
        OtherAreaRepositoryInterface $otherAreaRepository,
    )
    {
        $this->instructionRepository = $instructionRepository;
        $this->companyRepository = $companyRepository;
        $this->areaRepository = $areaRepository;
        $this->otherAreaRepository = $otherAreaRepository;
    }

    # Display a listing of the resource.
    public function index()
    {
        abort_unless(Gate::allows('instruction_access'), 403);

        $attributes = (object)[
            'title' => 'Instructions',
            'breadcrumb' => (object)[
                (object)[ 'title' => 'Dashboard', 'status' => '', 'previousUrl' => '/' ],
                (object)[ 'title' => 'Instructions', 'status' => 'active', 'previousUrl' => '' ]
            ]
        ];

        return view('instruction.index', compact('attributes'));
    }

    # Show the form for creating a new resource.
    public function create()
    {
        abort_unless(Gate::allows('instruction_create'), 403);

        $attributes = (object)[
            'title' => 'Instructions',
            'breadcrumb' => (object)[
                (object)[ 'title' => 'Dashboard', 'status' => '', 'previousUrl' => '/' ],
                (object)[ 'title' => 'Instructions', 'status' => '', 'previousUrl' => route('instructions.index') ],
                (object)[ 'title' => 'New', 'status' => 'active', 'previousUrl' => '' ]
            ],
            'formTitle' => 'NEW INSTRUCTION'
        ];

        return view('instruction.create', compact('attributes'));
    }

    # Store a newly created resource in storage.
    public function store(InstructionStoreRequest $request)
    {
        abort_unless(Gate::allows('instruction_create'), 403);

        DB::beginTransaction();

        try {
            if($request->validated()) {
                $this->instructionRepository->createInstruction($request);
            }

            DB::commit();

            session()->flash('success', __('formprocess.instruction.store.success'));

            $url = $request->nextPage == 0 ? route('instructions.index') : route('assessments.index');

            return response()->json([
                'url' => $url
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => __('formprocess.instruction.store.failed')
            ], 500);
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
        abort_unless(Gate::allows('instruction_edit'), 403);

        $attributes = (object)[
            'title' => 'Instructions',
            'breadcrumb' => (object)[
                (object)[ 'title' => 'Dashboard', 'status' => '', 'previousUrl' => '/' ],
                (object)[ 'title' => 'Instructions', 'status' => '', 'previousUrl' => route('instructions.index') ],
                (object)[ 'title' => 'Edit', 'status' => 'active', 'previousUrl' => '' ]
            ],
            'formTitle' => 'EDIT INSTRUCTION'
        ];

        $company = array($instruction->company_id, $this->companyRepository->getNameById($instruction->company_id));
        $area = array($instruction->area_id, $this->areaRepository->getTitleById($instruction->area_id));

        $otherarea = [];
        $otherAreas = InstructionOtherarea::with('otherarea:id,title')->where('instruction_id', $instruction->id)->get();
        foreach ($otherAreas as $value) {
            $otherarea[] = array($value->otherarea_id, $this->otherAreaRepository->getTitleById($value->otherarea_id));
        }

        $tagnums = [];
        $tagNumbers = InstructionTagnum::select('tagnumber')->where('instruction_id', $instruction->id)->get();
        foreach ($tagNumbers as $value) {
            $tagnums[] = $value->tagnumber;
        }

        $engineers = [];
        $people = InstructionPerson::with('user_account:username,name')->where('instruction_id', $instruction->id)->get();
        foreach ($people as $value) {
            $engineers[] = array($value->user_account->username => $value->user_account->name);
        }

        $dateRange = [
            'startDate' => Carbon::parse($instruction->date_activity_start)->format('d/m/Y'),
            'endDate' => Carbon::parse($instruction->date_activity_end)->format('d/m/Y')
        ];

        return view('instruction.edit', compact('instruction','attributes','company','area','otherarea','tagnums','engineers','dateRange'));
    }

    # Update the specified resource in storage.
    public function update(InstructionStoreRequest $request, Instruction $instruction)
    {
        abort_unless(Gate::allows('instruction_edit'), 403);

        DB::beginTransaction();

        try {
            if($request->validated()) {
                $this->instructionRepository->updateInstruction($request, $instruction);
            }

            DB::commit();

            session()->flash('success', __('formprocess.instruction.update.success'));

            return response()->json([
                'url' => route('instructions.index')
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => __('formprocess.instruction.update.failed')
            ], 500);
        }
    }

    # Remove the specified resource from storage.
    public function destroy(Instruction $instruction)
    {
        abort_unless(Gate::allows('instruction_delete'), 403);

        DB::beginTransaction();

        try {
            $instruction->delete();

            DB::commit();

            return response()->json([
                'message' => __('formprocess.instruction.destroy.success')
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());

            return response()->json([
                'message' => __('formprocess.instruction.destroy.failed')
            ], 500);
        }
    }

    # Display a listing of the resource on datatable.
    public function showRowsOnTable()
    {
        $actionBtn = request('actionBtn');

        $query = Instruction::with('company:id,name','area');

        return DataTables::of($query,$actionBtn)
            ->addColumn('instruction_num', function($query) use ($actionBtn) {
                if($actionBtn == 1) {
                    return '<a class="btn btn-sm btn-orange mr-2" href="'.route('assessments.create', ['id' => $query->id]).'"><i class="fa-solid fa-right-to-bracket"></i></a>'.$query->instruction_num;
                } else {
                    return $query->instruction_num;
                }
            })
            ->addColumn('companyname', function($query) {
                return $query->company->name;
            })
            ->addColumn('areaname', function($query) {
                return $query->area->title;
            })
            ->addColumn('subarea', function($query) {
                $otherAreas = InstructionOtherarea::with('otherarea:id,title')->where('instruction_id', $query->id)->get();

                $listOtherArea = "";
                foreach ($otherAreas as $area) {
                    $listOtherArea = $listOtherArea.'<span class="badge badge-default mr-1">'.$area->otherarea->title.'</span>';
                }

                return $listOtherArea;
            })
            ->addColumn('tagnumber', function($query) {
                $tagNumbers = InstructionTagnum::select('tagnumber')->where('instruction_id', $query->id)->get();

                $listTagnum = "";
                foreach ($tagNumbers as $tagnum) {
                    $listTagnum = $listTagnum.'<span class="badge badge-default mr-1">'.$tagnum->tagnumber.'</span>';
                }

                return $listTagnum;
            })
            ->addColumn('instruction_status', function($query) {
                $spanColor = $query->status == True ? 'badge-success' : 'badge-danger';
                $spanText = $query->status == True ? 'Complete' : 'Pending';

                return '<span class="badge '.$spanColor.'">'.$spanText.'</span>';
            })
            ->addColumn('instruction_period', function($query) {
                return Carbon::parse($query->date_activity_start)->format('d/m/Y').' - '.Carbon::parse($query->date_activity_end)->format('d/m/Y');
            })
            ->addColumn('engineers', function($query) {
                $engineers = InstructionPerson::with('user_account:username,name')->where('instruction_id', $query->id)->get();

                $listEngineer = "";
                foreach ($engineers as $engineer) {
                    $listEngineer = $listEngineer.'<span class="badge badge-default mr-1">'.$engineer->user_account->name.'</span>';
                }

                return $listEngineer;
            })
            ->addColumn('actions', function($query) use ($actionBtn) {
                if( $actionBtn == 1 ) {
                    return '';
                } else {
                    return '<a href="'.route('instructions.edit', $query->id).'"><i class="fa-solid fa-pen-to-square text-gray cursor-pointer mr-2" title="Edit"></i></a>'.
                           '<i class="fa-solid fa-trash-can text-gray cursor-pointer mr-2" title="Delete" onclick="deleteInstruction(\''.route('instructions.destroy', $query->id).'\')"></i>'.
                           '<a href="'.route('reporting.pdf', ['id' => $query->id, 'companyid' => $query->company->id, 'productid' => null]).'" target="_blank">'.
                                '<i class="fa-solid fa-folder-open text-gray cursor-pointer" title="Show">Report</i>'.
                            '</a>';
                }
            })
            ->addColumn('notes', function($query) use ($actionBtn) {
                if( $actionBtn == 1 ) {
                    return $query->notes;
                } else {
                    return '';
                }
            })
            ->rawColumns(['actions','instruction_status','instruction_period','engineers','subarea','tagnumber','instruction_num'])
            ->make(true);
    }
}
