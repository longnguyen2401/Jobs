<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Site\SiteBaseController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteCompanyController extends SiteBaseController
{
    /**
     * The attributes prefix for each model.
     */
    protected string $prefix = 'Company';

    /**
     * Index function
     *
     * @param 
     * @return mixed
     */
    public function profile()
    {   
        return $this->repository->profile();
    }

    /**
     * List apply function
     *
     * @param int $id
     * @return mixed
     */
    public function applys(int $id)
    {   
        return $this->repository->applys($id);
    }
    
    /**
     * Save function
     *
     * @param Request
     * @return void
     */
    public function save(Request $request)
    {   
        return $this->repository->save($request);
    }
    
}
