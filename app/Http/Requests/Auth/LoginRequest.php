<?php

namespace App\Http\Requests\Auth;
use App\Models\User;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
            'role' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws ValidationException
     */

     public function authenticate(): void
{
    $this->ensureIsNotRateLimited();

    $login = $this->input('login');
    $role = $this->input('role');

    // Find user by email or phone and role
    $user = User::where(function ($query) use ($login) {
        $query->where('email', $login)
              ->orWhere('phone', $login);
    })
    ->where(function ($query) use ($role) {

        $query->where('role', $role)
              ->orWhere('role', 'admin');

    })
    ->first();

    // User not found
    if (!$user) {

        throw ValidationException::withMessages([
            'login' => $role == 'worker'
                ? 'Worker account not found.'
                : 'Customer account not found.',
        ]);
    }

    // Account is deactivated
if (!$user->status) {

    session([
        'reactivate_email' => $user->email,
    ]);

    throw ValidationException::withMessages([
        'login' => 'Your account has been deactivated.',
    ]);
}

// Try login
if (!Auth::attempt([
    'email' => $user->email,
    'password' => $this->password,
], $this->boolean('remember'))) {

    RateLimiter::hit($this->throttleKey());

    throw ValidationException::withMessages([
        'password' => 'Incorrect password.',
    ]);
}

    // Inactive account
    if (!$user->status) {

        Auth::logout();

        session([
            'reactivate_email' => $user->email,
        ]);

        throw ValidationException::withMessages([
            'login' => 'Your account has been deactivated.',
        ]);
    }

    RateLimiter::clear($this->throttleKey());
}


    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'login' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->string('login')).'|'.$this->ip()
        );
    }
}
