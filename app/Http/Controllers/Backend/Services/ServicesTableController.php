<?php

namespace App\Http\Controllers\Backend\Services;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Services\ManageServiceRequest;
use App\Repositories\Backend\ServicesRepository;
use Yajra\DataTables\Facades\DataTables;

class ServicesTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\PagesRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PagesRepository $repository
     */
    public function __construct(ServicesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\ManagePageRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageServiceRequest $request)
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
