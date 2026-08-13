<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->merge([
            'email' => strtolower(trim($request->email)),
        ]);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'unique:users'],
            'role' => ['required', 'in:customer,worker'],
            'recaptcha_token' => ['required', 'string'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Verify Google reCAPTCHA
        |--------------------------------------------------------------------------
        */

        /*
|--------------------------------------------------------------------------
| Verify Google reCAPTCHA
|--------------------------------------------------------------------------
*/

// Bypasses check entirely on local/development environment
if (!app()->environment('local')) {

    $recaptchaResponse = Http::asForm()
        ->timeout(10)
        ->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => config('services.recaptcha.secret_key'),
            'response' => $request->recaptcha_token,
            'remoteip' => $request->ip(),
        ]);

    if (!$recaptchaResponse->successful()) {
        throw ValidationException::withMessages([
            'recaptcha_token' => 'Security verification is temporarily unavailable. Please try again.',
        ]);
    }

    $recaptcha = $recaptchaResponse->json();

    $isSuccess    = $recaptcha['success'] ?? false;
    $actionPasses = ($recaptcha['action'] ?? '') === 'register';
    $scorePasses  = ($recaptcha['score'] ?? 0) >= 0.5;

    if (!$isSuccess || !$actionPasses || !$scorePasses) {
        throw ValidationException::withMessages([
            'recaptcha_token' => 'Security verification failed. Please try again.',
        ]);
    }
}

        /*
        |--------------------------------------------------------------------------
        | Create User
        |--------------------------------------------------------------------------
        */

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'phone'    => $request->phone,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Send Email Verification
        |--------------------------------------------------------------------------
        */

        event(new Registered($user));

        Auth::login($user);

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'worker') {
            return redirect()->route('worker.dashboard');
        }

        return redirect()->route('customer.dashboard');
    }
}