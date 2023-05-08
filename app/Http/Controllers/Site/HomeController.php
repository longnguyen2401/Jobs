<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {   
        return view('site.job.list');
    }
}
