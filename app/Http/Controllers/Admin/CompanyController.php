<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class CompanyController extends CURDController
{
    /**
     * The attributes prefix for each model.
     */
    protected string $prefix = 'Company';
}
