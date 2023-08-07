<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Greeting;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class AuthController extends Controller
{
    public function showRegistration(): View
    {
        return view('auth.register');
    }

    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function showForgotPassword(): View
    {
        return view('auth.forgot');
    }

    public function registration(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'unique:users'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);




        if ($user) {
            auth('web')->login($user);
        }
        dump($data['email']);
        Mail::to($data['email'])->send(new Greeting('Добро пожаловать'));

        return redirect(route('home'));
    }

    public function login(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth('web')->attempt($data)) {
            return redirect(route('/'));
        }

        return redirect(route('login'))->withErrors(['email' => 'Почта или пароль введены не правильно']);
    }


    public function logout(): RedirectResponse
    {
        auth('web')->logout();

        return redirect(route('home'));
    }
}
