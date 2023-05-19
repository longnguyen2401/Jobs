<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class FilterController extends Controller
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
    public function index(Request $request, $prefix)
    {   
        return this->repository->detail($request, $prefix);
    }
}
