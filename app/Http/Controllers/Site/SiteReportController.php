<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Site\SiteBaseController;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SiteReportController extends SiteBaseController
{
    /**
     * The attributes prefix for each model.
     */
    protected string $prefix = 'Report';

    /**
     * Save function
     *
     * @param 
     * @return void
     */
    public function sendReport(Request $request)
    {   
        return $this->repository->sendReport($request);
    }
}
