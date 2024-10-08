<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    private const LOGIN_MESSAGE = 'Đăng nhập thành công';
    private const LOGOUT_MESSAGE = 'Đăng xuất thành công';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Hiện tại cookie chỉ sống 120p
            $request->session()->regenerate();

            Toastr::success(null, self::LOGIN_MESSAGE);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => __('auth.failed')])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Toastr::success(null, self::LOGOUT_MESSAGE);
        return redirect()->route('home');
    }
}
