<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()
                     ->paginate(20);

        return view(
            'admin.users.index',
            compact('users')
        );
    }

    public function toggleStatus(User $user)
    {
        $user->update([
            'status' => !$user->status
        ]);

        return back()
            ->with(
                'success',
                'User status updated successfully.'
            );
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()
            ->with(
                'success',
                'User deleted successfully.'
            );
    }
}