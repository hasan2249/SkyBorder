<?php

namespace App\Http\Controllers\Backend\Services;;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Services\CreateServiceRequest;
use App\Http\Requests\Backend\Services\DeleteServiceRequest;
use App\Http\Requests\Backend\Services\EditServiceRequest;
use App\Http\Requests\Backend\Services\ManageServiceRequest;
use App\Http\Requests\Backend\Services\StoreServiceRequest;
use App\Http\Requests\Backend\Services\UpdateServiceRequest;
use App\Http\Responses\Backend\Service\EditResponse;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Service;
use App\Plan;
use App\Repositories\Backend\ServicesRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;


class ServicesController extends Controller
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
        View::share('js', ['services']);
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\ManagePageRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageServiceRequest $request)
    {
        return new ViewResponse('backend.services.index');
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\CreateServiceRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function create(CreateServiceRequest $request)
    {
        return new ViewResponse('backend.services.create');
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\StorePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreServiceRequest $request)
    {
        $path = "";
        if ($request->hasFile('img')) {
            //  Let's do everything here
            if ($request->file('img')->isValid()) {
                
                //
                $validated = $request->validate([
                    'img' => 'mimes:jpeg,png,jpg|max:2048',
                ]);

                $path = Storage::putFileAs(
                    'public/images', $request->file('img'), $request->file('img')->getClientOriginalName()
                );
            }
        }
        
        $this->repository->create($request->except(['_token', '_method']), $path);

        return new RedirectResponse(route('admin.services.index'), ['flash_success' => __('alerts.backend.pages.created')]);
    }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\EditServiceRequest $request
     *
     * @return \App\Http\Responses\Backend\Blog\EditResponse
     */
    public function edit(Service $service, EditServiceRequest $request)
    {
        return new EditResponse($service);
    }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\UpdatePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Service $service, UpdateServiceRequest $request)
    {
        $path = "";
        if ($request->hasFile('img')) {
            //  Let's do everything here
            if ($request->file('img')->isValid()) {
                
                //
                $validated = $request->validate([
                    'img' => 'mimes:jpeg,png,jpg|max:2048',
                ]);

                $path = Storage::putFileAs(
                    'public/images', $request->file('img'), $request->file('img')->getClientOriginalName()
                );
            }
        }
        $this->repository->update($service, $request->except(['_token', '_method']), $path);

        return new RedirectResponse(route('admin.services.index'), ['flash_success' => __('alerts.backend.pages.updated')]);
    }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\DeletePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Service $service, DeleteServiceRequest $request)
    {
        $this->repository->delete($service);

        return new RedirectResponse(route('admin.services.index'), ['flash_success' => __('alerts.backend.pages.deleted')]);
    }


    public function showServiceDescription(Request $request , $id)
    {
        $service = Service::findOrFail($id);
        return view('frontend.serviceDescription')->with('service' , $service);
    }
    
    public function showPlanDescription(Request $request , $id)
    {
        $plan = Plan::findOrFail($id);
        return view('frontend.planDescription')->with('plan' , $plan);
    }
    
    
}
