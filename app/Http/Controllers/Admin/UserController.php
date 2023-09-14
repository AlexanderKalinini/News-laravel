<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController
{
    public function index(): View
    {
        $users = User::paginate(10);
        return view('admin.admin_table_users', ['users' => $users]);
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return to_route('admin.posts.users');
    }
}
