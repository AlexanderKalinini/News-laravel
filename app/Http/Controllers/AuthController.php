<?php

namespace App\Http\Controllers;

use App\Http\{Requests\FeedbackRequest, Requests\PostRequest};
use App\Mail\{ForgotPassword, Greeting, Feedback};
use App\Models\{User, Post, Comment};
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\{Facades\Mail, Facades\Hash, Str};;

class AuthController
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
        $user->password = Hash::make($password);
        $user->save();

        Mail::to($data['email'])->send(new ForgotPassword($password));

        return to_route('home');
    }


    public function registration(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'unique:users', 'max:32'],
            'email' => ['required', 'email', 'unique:users', 'max:50'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Mail::to($data['email'])->send(new Greeting('Добро пожаловать'));

        if ($user) {
            auth('web')->login($user);
        }

        return to_route('home');
    }

    public function login(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth('web')->attempt($data)) {

            return to_route('home');
        }

        return to_route('login')->withErrors(['email' => 'Почта или пароль введены не правильно']);
    }


    public function logout(): RedirectResponse
    {
        auth('web')->logout();
        session()->flush();

        return to_route('home');
    }

    public function showPost(Post $post): View
    {
        $comments = $post->comments;

        return view('post.posts_show', ['post' => $post,  'comments' => $comments,]);
    }

    public function sendComment(PostRequest $request, Post $post,)
    {
        $data = $request->validated();

        Comment::create(
            ['post_id' => $post->id, 'user_id' => auth()->user()->id] + $data,
        );

        return to_route('showPost', ['post' => $post]);
    }

    public function showContactForm()
    {
        return view('email.contact_form');
    }

    public function sendContactForm(FeedbackRequest $request)
    {
        $messages = $request->all();

        $admin = Admin::select('email')->orderBy('created_at')->first();


        Mail::to($admin)->send(new Feedback($messages));

        return to_route('showContactForm');
    }
}
