<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Mail\ForgotPassword;
use App\Mail\Greeting;
use App\Models\User;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Mail\Feedback;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
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
        $user->password = bcrypt($password);
        $user->save();

        Mail::to($data['email'])->send(new ForgotPassword($password));

        return to_route('home');
    }


    public function registration(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'min:3', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
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

    public function showPost(string $id): View
    {
        $post = Post::find($id);

        $comments = Comment::join('users', 'comments.id', '=', 'users.id')
            ->select('users.name', 'comments.text')->where('post_id', $id)
            ->get();
        dump($comments);
        return view('post.posts_show', ['post' => $post,  'comments' => $comments,]);
    }

    public function sendComment(PostRequest $request, string $post_id,)
    {
        $data = $request->validated();

        Comment::insert(
            ['post_id' => $post_id] + $data,
        );
        return to_route('showPost', ['id' => $post_id]);
    }

    public function showContactForm()
    {
        return view('email.contact_form');
    }

    public function sendContactForm(FeedbackRequest $request)
    {
        $messages = $request->all();
        $email = Admin::select('email')->orderBy('created_at')->first();


        Mail::to($email)->send(new Feedback($messages));
        return to_route('showContactForm');
    }
}
