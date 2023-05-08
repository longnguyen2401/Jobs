<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteCompanyController extends Controller
{
    /**
     * Construct function
     *
     * @return void
     */
    public function __construct()
    {   
    }

    /**
     * Index function
     *
     * @return void
     */
    public function detail()
    {   
        return view('site.company.detail');
    }
}
