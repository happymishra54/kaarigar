<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
{
    $user = auth()->user();

    return view('customer.profile.index', compact('user'));
}

public function edit()
{
    $user = auth()->user();

    return view('customer.profile.edit', compact('user'));
}

    public function update(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|unique:users,phone,' . auth()->id(),
            'email'   => 'required|email|unique:users,email,' . auth()->id(),
            'city'    => 'nullable|string|max:255',
            'state'   => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        auth()->user()->update([
            'name'    => $request->name,
            'phone'   => $request->phone,
            'email'   => $request->email,
            'city'    => $request->city,
            'state'   => $request->state,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()
        ->route('customer.profile')
        ->with(
            'success',
            'Profile Updated Successfully'
    );
    }

    public function deactivate(Request $request): RedirectResponse
{
    $request->validate([
        'password' => ['required', 'current_password'],
    ]);

    $user = $request->user();

    // Deactivate instead of deleting
    $user->update([
        'status' => 0,
        'email_verified_at' => null,
    ]);

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')
        ->with('success', 'Your account has been deactivated successfully.');
}
}