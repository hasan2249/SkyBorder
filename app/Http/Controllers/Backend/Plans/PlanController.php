<?php

namespace App\Http\Controllers\Backend\Plans;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\PlansRepository;
use App\Plan;
use App\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use Illuminate\Support\Facades\Validator;


class PlanController extends Controller
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
        View::share('js', ['plans']);
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\ManagePageRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(Request $request)
    {    
        return new ViewResponse('backend.plans.index');
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\CreateServiceRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function create(Request $request)
    {
        $services = Service::All();
        return new ViewResponse('backend.plans.create',['services' => $services]);
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\StorePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(Request $request)
    {
        
        $path = "";
        if ($request->hasFile('img')) {

            $files = $request->file('img');

                foreach ($files as $file) {
                    if ($file->isValid()) { 
                        $validator = Validator::make($request->all(), [
                                'img' => 'mimes:jpeg,png,jpg|max:2048',
                            ]);
                    // $file->store('users/' . $this->user->id . '/messages');
                    $path .= Storage::putFileAs(
                        'public/images',  $file, $file->getClientOriginalName()
                    );
                    $path .= "   " ;
                }
            }
        }
        
        $this->repository->create($request->except(['_token', '_method']), $path);

        return new RedirectResponse(route('admin.plans.index'), ['flash_success' => __('alerts.backend.pages.created')]);

    }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\EditServiceRequest $request
     *
     * @return \App\Http\Responses\Backend\Blog\EditResponse
     */
    public function edit(Plan $plan, Request $request)
    {
        $services = Service::All();
        return view('backend.plans.edit')
            ->withPlan($plan)->withServices($services);
    }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\UpdatePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Plan $plan, Request $request)
    {
        $path = "";
        if ($request->hasFile('img')) {
            //  Let's do everything here
            $images = $request->file('img');

            foreach($images as $image){
                $validator = Validator::make($request->all(), [
                    'img' => 'mimes:jpeg,png,jpg|max:2048',
                ]);

                if ($image->isValid()) {
            
                $path .= Storage::putFileAs(
                    'public/images', $image, $image->getClientOriginalName()
                );

                $path .= "   " ;
             }
            }
        }
        $this->repository->update($plan, $request->except(['_token', '_method']), $path);

        return new RedirectResponse(route('admin.plans.index'), ['flash_success' => __('alerts.backend.pages.updated')]);
 
    }

/**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\DeletePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Plan $plan, Request $request)
    {
        $this->repository->delete($plan);

        return new RedirectResponse(route('admin.plans.index'), ['flash_success' => __('alerts.backend.pages.deleted')]);
    }


    public function showDescription(Request $request , $id)
    {
        $service = Plan::findOrFail($id);
        return view('frontend.serviceDescription')->with('service' , $service);
    }
}

