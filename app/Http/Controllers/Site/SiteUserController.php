<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Site\SiteBaseController;
use Illuminate\Contracts\View\View;
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
     * @return mixed
     */
    public function profile(): mixed
    {   
        if (auth()->user()->type === config('constants.USER.TYPE.USER')) {
            return view('site.profile.user');
        }
        return redirect('/company/profile');
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
