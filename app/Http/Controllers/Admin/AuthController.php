<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function index(): View
  {
    // Admin::insert([
    //   'name' => 'Alex',
    //   'email' => 'prourist86@yandex.ru',
    //   'password' => bcrypt('123456')
    // ]);
    return view('admin.login');
  }

  public function login(Request $request): RedirectResponse
  {

    $data = $request->validate([
      'email' => ['required', 'email', 'string'],
      'password' => ['required'],
    ]);


    if (auth('admin')->attempt($data)) {

      return redirect(route('admin.posts.index'));
    }

    return redirect(route('admin.login'))->withErrors(['email' => 'Почта или пароль введены не правильно']);
  }

  public function logout(): RedirectResponse
  {
    auth('admin')->logout();

    return redirect(route('admin.login'));
  }
}
