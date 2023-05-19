<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthSiteController extends Controller
{
    /**
     * Index function
     *
     * @return void
     */
    public function index(): View
    {
        return view('site.auth.login');
    }

    /**
     * Confirm type of user
     *
     * @return void
     */
    public function typeConfirm(): View
    {
        return view('site.auth.type');
    }

    /**
     * Confirm type of user
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function typeSave(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'type' => ['in:1,2'],
        ]);

        $user = auth()->user();
        $user->type = $request->type;
        $user->save();

        if ($request->type == config('constants.USER.TYPE.COMPANY')) {
            return redirect('/company/profile');    
        }

        return redirect('/');
    }
    
    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'type' => ['in:1,2'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Change Password
     *
     * @return view
     */
    public function changePassword()
    {
        return view('site.auth.enter-password');
    }

    /**
     * Change Password
     *
     * @return view
     */
    public function savePassword(Request $request)
    {
        $pw = Hash::make($request->password);
        auth()->user()->password = $pw;
        auth()->user()->save();
        return redirect('/type/confirm');
    }
    
    /**
     * Logout
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
