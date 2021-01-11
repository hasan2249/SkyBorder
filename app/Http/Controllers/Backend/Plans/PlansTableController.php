<?php

namespace App\Http\Controllers\Backend\Plans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\PlansRepository;
use Yajra\DataTables\Facades\DataTables;

class PlansTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\PagesRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PagesRepository $repository
     */
    public function __construct(PlansRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\ManagePageRequest $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return Datatables::of($this->repository->getForDataTable())
            ->filterColumn('status', function ($query, $keyword) {
                if (in_array(strtolower($keyword), ['active', 'inactive'])) {
                    $query->where('services.status', (strtolower($keyword) == 'active') ? 1 : 0);
                }
            })
            ->editColumn('status', function ($service) {
                return $service->status_label;
            })
            ->editColumn('created_at', function ($service) {
                return $service->created_at->toDateString();
            })
            ->addColumn('actions', function ($service) {
                return $service->action_buttons;
            })
            ->escapeColumns(['title_ar'])
            ->make(true);
    }
}
