<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required|max:15',
            'address' => 'required|string|max:255',
            'password' => 'required|string|confirmed',
        ]);

        $user = User::create([
            'user_id' => md5(rand(50000000000, 90000000000)),
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        return redirect(url('/'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([

            'email' => 'required|email|max:50',
            'password' => 'required|string|max:64',
        ]);

        $isCorrect = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($isCorrect == true) {
            return redirect(url('/'));
        } else {
            return back();
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(url('/login'));
    }

}
