<?php

namespace App\Http\Controllers\Backend\Our_works;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\Our_worksRepository;
use Yajra\DataTables\Facades\DataTables;

class Our_worksTableController extends Controller
{
    /**
     * @var \App\Repositories\Backend\PagesRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PagesRepository $repository
     */
    public function __construct(Our_worksRepository $repository)
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
                    $query->where('our_works.status', (strtolower($keyword) == 'active') ? 1 : 0);
                }
            })
            ->editColumn('status', function ($our_works) {
                return $our_works->status_label;
            })
            ->editColumn('created_at', function ($our_works) {
                return $our_works->created_at->toDateString();
            })
            ->addColumn('actions', function ($our_works) {
                return $our_works->action_buttons;
            })
            ->escapeColumns(['title_ar'])
            ->make(true);
    }
}
