<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;





class UserController extends Controller
{
  public function index(): View
  {
    $users = User::paginate(10);
    return view('admin.admin_table_users', ['users' => $users]);
  }

  public function destroy(string $post): RedirectResponse
  {
    User::destroy($post);
    return redirect(route('admin.posts.users'));
  }
}
