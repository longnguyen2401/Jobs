<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Site\SiteBaseController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteRequestController extends SiteBaseController
{
    /**
     * The attributes prefix for each model.
     */
    protected string $prefix = 'Request';

    /**
     * Apply list function
     *
     * @param Request $request
     * @return View
     */
    public function list(Request $request, $id)
    {   
        return $this->repository->list($request, $id);
    }

    /**
     * Index function
     *
     * @param Request $request
     * @return View
     */
    public function apply(Request $request)
    {   
        return $this->repository->apply($request);
    }

    /**
     * Index function
     *
     * @return View
     */
    public function listRequest(): View
    {   
        return view('site.profile.user');
    }
}
