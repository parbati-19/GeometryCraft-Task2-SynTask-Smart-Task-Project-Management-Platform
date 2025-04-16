<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Display the register UI.
     */
    public function show()
    {
        return view('auth.register');
    }

    /**
     * handles the user registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'firstname'=> 'required|string',
            'lastname'=> 'required|string',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'firstname'=> $request->firstname,
            'lastname'=> $request->lastname,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/dashboard')->with('success', 'User registered and logged in!');


    }
  
}
