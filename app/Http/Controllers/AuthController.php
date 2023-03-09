<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    }

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect('https://www.googleapis.com/auth/gmail.readonly');
    }

    public function callbeckGoogle()
    {
        $user = Socialite::driver('google')->user();
        if(User::find($user['email'])){
            $this->googleAuth($user);
        }else{
        $this->regOrLogin($user);
        }

    }

    public function regOrLogin($user)
    {
        $newUser = new User();
        $newUser->email = $user['email'];
        $newUser->password = bcrypt('123456');
        $newUser->save();

        return view("index");
    }

    public function googleAuth($user)
    {
        $credentials = $user['email'];
        if (Auth::attempt($credentials)) {
            return view("index");
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }
}
