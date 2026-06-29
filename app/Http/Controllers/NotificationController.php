<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()
            ->notifications()
            ->latest()
            ->get();

        return view(
            'notifications.index',
            compact('notifications')
        );
    }

    public function read($id)
    {
        auth()->user()
            ->notifications()
            ->where('id',$id)
            ->first()
            ?->markAsRead();

        return back();
    }
}