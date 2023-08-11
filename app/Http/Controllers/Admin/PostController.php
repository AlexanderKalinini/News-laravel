<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(): View
  {
    return view('admin.admin_dashboard');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    $posts = Post::paginate(10);
    return view('admin.admin_table', ['posts' => $posts]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    Post::create([]);
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
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Post::destroy($id);
    return redirect(route('admin.posts.create'));
  }
}
