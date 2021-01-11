<?php

namespace App\Http\Responses\Backend\Service;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var \App\Models\Service\Service
     */
    protected $service;

    /**
     * @param \App\Models\Service\Page $page
     */
    public function __construct($service)
    {
        $this->service = $service;
    }

    /**
     * toReponse.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function toResponse($request)
    {
        return view('backend.services.edit')
            ->withService($this->service);
    }
}
