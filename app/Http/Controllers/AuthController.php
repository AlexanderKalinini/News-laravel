<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Mail\Greeting;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;



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

  public function forgotProcess(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'email' => ['email', 'required', 'exists:users', 'string'],
    ]);

    $user = User::where('email', $data['email'])->first();

    $password = Str::random(5);
    dump($user);

    $user->password = bcrypt($password);
    $user->save();

    Mail::to($data['email'])->send(new ForgotPassword($password));


    return redirect(route('home'));
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

    Mail::to($data['email'])->send(new Greeting('Добро пожаловать'));

    if ($user) {
      auth('web')->login($user);
    }

    return redirect(route('home'));
  }

  public function login(Request $request): RedirectResponse
  {
    $data = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (auth('web')->attempt($data)) {
      return redirect(route('home'));
    }

    return redirect(route('login'))->withErrors(['email' => 'Почта или пароль введены не правильно']);
  }


  public function logout(): RedirectResponse
  {
    auth('web')->logout();

    return redirect(route('home'));
  }
}
