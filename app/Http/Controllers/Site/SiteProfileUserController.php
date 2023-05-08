<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Site\SiteBaseController;
use Illuminate\Http\Request;

class SiteProfileUserController extends SiteBaseController
{
    /**
     * The attributes prefix for each model.
     */
    protected string $prefix = 'ProfileUser';

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
