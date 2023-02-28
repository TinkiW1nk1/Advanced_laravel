<?php

namespace App\Http\Controllers;

use App\Servises\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function handleLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/Category/all')
                ->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function registration(Request $request)
    {
        return view('Registration');
    }

    public function handleRegistration(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect('login')->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        $user = new \App\Models\User();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
    }
}
