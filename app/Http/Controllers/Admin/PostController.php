<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminPostRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\View\View;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class PostController extends BaseController
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
    public function store(AdminPostRequest $request)
    {
        $data = $request->validated();

        $data['thumbnail'] = isset($data['thumbnail'])
            ? str_replace('public/', '', Storage::put('public/image', $data['thumbnail']))
            : null;
        Post::create($data);
        return to_route('admin.posts.index');
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
    public function edit(Post $post)
    {

        return view(
            'admin.admin_edit',
            ['post' => $post]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminPostRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['thumbnail'] = isset($data['thumbnail'])
            ? str_replace('public/', '', Storage::put('public/image', $data['thumbnail']))
            : null;

        $post->update($data);

        return to_route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return to_route('admin.posts.index');
    }
}
