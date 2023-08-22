<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    $posts = Post::orderByDesc('created_at')->paginate(10);



    return view('admin.admin_table', ['posts' => $posts]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    return view('admin.admin_create_edit');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->validate([
      'title' => ['required', 'min:3', 'string'],
      'preview' => ['required', 'min:3', 'string'],
      'description' => ['required', 'min:3', 'string'],
      'thumbnail' => ['image',]
    ]);

    $data['thumbnail'] = isset($data['thumbnail'])
      ? str_replace('public/', '', Storage::put('public/image', $data['thumbnail']))
      : null;
    Post::create($data);
    return redirect(route('admin.posts.index'));
  }

  /**
   * Display the specified resource.
   */
  public function show()
  {
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $post = Post::where('id', '=', $id)->first();


    return view('admin.admin_edit', [
      'id' => $id,
      'title' => $post->title,
      'preview' => $post->preview,
      'description' => $post->description,
      'thumbnail' => $post->thumbnail

    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $data = $request->validate(
      [
        'title' => ['required', 'min:3', 'string'],
        'preview' => ['required', 'min:3', 'string'],
        'description' => ['required', 'min:3', 'string'],
        'thumbnail' => ['image']
      ]
    );


    $data['thumbnail'] = isset($data['thumbnail'])
      ? str_replace('public/', '', Storage::put('public/image', $data['thumbnail']))
      : null;



    Post::where('id', $id)->update($data);

    return redirect(route('admin.posts.index'));
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $post): RedirectResponse
  {
    Post::destroy($post);
    return redirect(route('admin.posts.index'));
  }
}
