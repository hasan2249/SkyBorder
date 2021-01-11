<?php

namespace App\Http\Responses\Backend\Page;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var \App\Models\Service\Service
     */
    protected $page;

    /**
     * @param \App\Models\Service\Page $page
     */
    public function __construct($page)
    {
        $this->page = $page;
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
        return view('backend.pages.edit')
            ->withPage($this->page);
    }
}
