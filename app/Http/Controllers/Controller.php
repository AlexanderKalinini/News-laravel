<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Post;


class Controller extends BaseController
{
  use AuthorizesRequests, ValidatesRequests;

  public function index(): View
  {
    // $posts = Post::all()->sortByDesc('created_at')->take(7);
    $posts = Post::select('title', 'thumbnail', 'preview', 'id')->orderByDesc('created_at')->paginate(3);




    return view('post.posts_index', [
      'posts' => $posts,

    ]);
  }
}
