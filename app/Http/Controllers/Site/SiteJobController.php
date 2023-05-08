<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Site\SiteBaseController;
use Illuminate\Contracts\View\View;

class SiteJobController extends SiteBaseController
{
    /**
     * The attributes prefix for each model.
     */
    protected string $prefix = 'Job';

    /**
     * Index function
     *
     * @return View
     */
    public function index(): View
    {   
        return $this->repository->index();
    }

    /**
     * Index function
     *
     * @return void
     */
    public function detail()
    {   
        return view('site.profile.user');
    }
}
