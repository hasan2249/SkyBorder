<?php

namespace App\Http\Controllers\Backend\Our_works;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\Our_worksRepository;
use App\Our_work;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use Illuminate\Support\Facades\Validator;


class Our_worksController extends Controller
{
/**
     * @var \App\Repositories\Backend\Our_worksRepository
     */
    protected $repository;

    /**
     * @param \App\Repositories\Backend\PagesRepository $repository
     */
    public function __construct(Our_worksRepository $repository)
    {
        $this->repository = $repository;
        View::share('js', ['our_works']);
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\ManagePageRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(Request $request)
    {
        
        return new ViewResponse('backend.our_works.index');
    }

    /**
     * @param \App\Http\Requests\Backend\Pages\CreateServiceRequest $request
     *
     * @return \App\Http\Responses\ViewResponse
     */
    public function create(Request $request)
    {
        return new ViewResponse('backend.our_works.create');
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
                    $path .= Storage::putFileAs(
                        'public/images',  $file, $file->getClientOriginalName()
                    );
                    $path .= "   " ;
                }
            }
        }
        
        $this->repository->create($request->except(['_token', '_method']), $path);

        return new RedirectResponse(route('admin.our_works.index'), ['flash_success' => __('alerts.backend.pages.created')]);

        }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\EditServiceRequest $request
     *
     * @return \App\Http\Responses\Backend\Blog\EditResponse
     */
    public function edit(Our_work $our_work, Request $request)
    {
        return view('backend.our_works.edit')
            ->withOur_work($our_work);
    }

    /**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\UpdatePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(Our_work $our_work, Request $request)
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
        $this->repository->update($our_work, $request->except(['_token', '_method']), $path);

        return new RedirectResponse(route('admin.our_works.index'), ['flash_success' => __('alerts.backend.pages.updated')]);
 
       }

/**
     * @param \App\Models\Page $page
     * @param \App\Http\Requests\Backend\Pages\DeletePageRequest $request
     *
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Our_work $our_work, Request $request)
    {
        $this->repository->delete($our_work);

        return new RedirectResponse(route('admin.our_works.index'), ['flash_success' => __('alerts.backend.pages.deleted')]);
    }


    public function showDescription(Request $request , $id)
    {
        $our_work = Our_work::findOrFail($id);
        return view('frontend.our_workDescription')->with('our_work' , $our_work);
    }
}

