<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        if (auth()->user()->role !== 'admin') {

            auth()->logout();

            return back()->withErrors([
                'email' => 'Only admins can login using email and password.'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function firebaseLogin(Request $request)
{
    $request->validate([
        'phone' => 'required'
    ]);

    $user = User::where('phone', $request->phone)->first();

    if (!$user) {

        $user = User::create([
            'name' => 'User',
            'phone' => $request->phone,
            'email' => null,
            'password' => null,
            'role' => 'customer'
        ]);

    }

    Auth::login($user);

    $request->session()->regenerate();

    return response()->json([
        'success' => true,
        'redirect' => '/choose-mode'
    ]);
}

}
