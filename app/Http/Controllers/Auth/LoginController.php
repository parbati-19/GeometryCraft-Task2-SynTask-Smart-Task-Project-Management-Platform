<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display the login UI.
     */
    public function show()
    {
        return view('auth.login');
    }


    /**
     * checks the login credentials and redirect to dashboard.
     */
    public function login(Request $request)
    {
        $credientials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        if (Auth::attempt($credientials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'email'=> 'Invalid Email',
            'password'=>'Invalid password',
        ]);
    }
}
