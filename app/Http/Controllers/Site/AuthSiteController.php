<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Traits\SMSTrait;

class AuthSiteController extends Controller
{
    use SMSTrait;

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

        if (auth()->user()->type == config('constants.USER.TYPE.DEFAULT')) {
            return redirect('/type/confirm');
        }
        
        return redirect('/');
    }

    
    /**
     * View loggin
     *
     * @return view
     */
    public function register()
    {
        return view('site.auth.register');
    }

    /**
     * View loggin
     *
     * @return view
     */
    public function registerSave(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password),
            ]
        );
        Auth::login($user);
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
    
    /**
     * View forgot Password
     *
     * @return view
     */
    public function forgotPassword()
    {
        return view('site.auth.get-password');
    }

    /**
     * 
     *
     * @return 
     */
    public function checkPhoneNumber(Request $request)
    {   
        $request->validate([
            'phone' => ['required', 'min:4']
        ]);
        // findByPhone
        $user = User::findByPhone($request->phone);
        
        if (isset($user)) {
            return view('site.auth.send-sms', compact('user'));
        } else {
            return Redirect::back()->withErrors(['phone' => 'Không tìm thấy tài khoảng khớp số điện thại']);
        }
    }
    
    /**
     * 
     *
     * @return 
     */
    public function sendSMS(Request $request)
    {   
        $request->validate([
            'phone' => ['required']
        ]);
        
        $user = User::findByPhone($request->phone);
        
        try {
            if (isset($user)) {
                $randomOTP = rand(100000, 999999);
                $timeExpire = Carbon::now()->addMinutes(1);
    
                $user->otp = $randomOTP;
                $user->expire_otp = $timeExpire;
                $user->save();
                session()->put('expire_otp', $timeExpire);
                session()->put('user_otp', $user);
                
                // Send SMS
                $phone = substr_replace($request->phone, '+', 0, 1);
                $messageOTP = 'Mã OTP của bạn là ' . $randomOTP . '. Mã tồn tại trong 60s hãy nhập mã này trước khi hết hạn!';
                $this->sendSingleMessage($phone, $messageOTP);

                return Redirect('otp/enter');
            } else {
                return Redirect::back()->withErrors(['phone' => 'Không tìm thấy tài khoảng khớp số điện thại']);
            }
        } catch (\Exception $e) {
            dd($e);
            $message = 'Đã xảy ra lỗi khi cập nhật thông tin! hãy thử lại.';
            return Redirect::back()->withErrors(['message' => $message]);
        }
    }

    /**
     * 
     *
     * @return 
     */
    public function viewOTP(Request $request)
    {   
        return view('site.auth.otp');
    }

    /**
     * 
     *
     * @return 
     */
    public function checkOTP(Request $request)
    {   
        $request->validate([
            'digit-1' => ['required'],
            'digit-2' => ['required'],
            'digit-3' => ['required'],
            'digit-4' => ['required'],
            'digit-5' => ['required'],
            'digit-6' => ['required'],
            'phone' => ['required'],
        ]);

        $otp = $request->{'digit-1'} . $request->{'digit-2'} . $request->{'digit-3'} . $request->{'digit-4'} . $request->{'digit-5'} . $request->{'digit-6'};
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s');
        $user = User::where('phone', $request->phone)
        ->where('expire_otp', '>', $now)
        ->where('otp', $otp)->first();

        if ($user) {
            Auth::login($user);
            return view('site.auth.enter-password');
        }

        $message = 'Mã OTP không đúng';
        return Redirect::back()->withErrors(['OTP' => $message]);
    }
}
