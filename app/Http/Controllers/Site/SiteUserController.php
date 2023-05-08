<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Site\SiteBaseController;
use Illuminate\Http\Request;

class SiteUserController extends SiteBaseController
{
    /**
     * The attributes prefix for each model.
     */
    protected string $prefix = 'User';

    /**
     * Index function
     *
     * @return void
     */
    public function detail()
    {   
        return view('site.profile.user');
    }

    /**
     * Index function
     *
     * @param Request
     * @return void
     */
    public function save(Request $request)
    {   
        return $this->repository->save($request);
    }
}
