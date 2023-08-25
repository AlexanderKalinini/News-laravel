<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class AuthController extends BaseController
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
            return to_route('admin.posts.index');
        }

        return to_route('admin.login')->withErrors(['email' => 'Почта или пароль введены не правильно']);
    }

    public function logout(): RedirectResponse
    {
        auth('admin')->logout();
        session()->flush();
        return to_route('admin.login');
    }
}
