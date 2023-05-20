<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileUserController extends CURDController
{
    /**
     * The attributes prefix for each model.
     */
    protected string $prefix = 'ProfileUser';
}
