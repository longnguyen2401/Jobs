<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Site\SiteBaseController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
     * @return View
     */
    public function create(): View
    {   
        return $this->repository->create();
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

    /**
     * Index function
     *
     * @return
     */
    public function delele($id)
    {   
        return $this->repository->delele($id);
    }
}
