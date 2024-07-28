<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $auth;

    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        if (!empty($this->auth::user())) {
            return redirect(route('dashboard'));
        }
        return view('authentication.login');
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user = $this->auth::attempt($validate);
        if ($user) {
            return redirect(route('dashboard'));
        }
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    public function logout(Request $request)
    {
        $this->auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
