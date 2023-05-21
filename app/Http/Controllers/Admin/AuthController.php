<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Index function
     *
     * @return void
     */
    public function index()
    {
        return view('admin.login');
    }
    
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'type' => ['in:1'],
        ]);
 
        if (\Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('admin/company');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    /**
     * Logout
     *
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/admin/login');
    }
}
