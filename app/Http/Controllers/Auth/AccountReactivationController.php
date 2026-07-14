<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\AccountReactivationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class AccountReactivationController extends Controller
{
    /**
     * Send Reactivation Email
     */
    public function send(Request $request)
    {
        $request->validate([
            'email' => ['required'],
        ]);

        $user = User::where('email', $request->email)
            ->orWhere('phone', $request->email)
            ->first();

        if (!$user) {
            return back()->withErrors([
                'login' => 'Account not found.',
            ]);
        }

        if ($user->status) {
            return back()->with(
                'success',
                'Your account is already active.'
            );
        }

        $url = URL::temporarySignedRoute(
            'account.reactivate.verify',
            now()->addMinutes(60),
            [
                'user' => $user->id,
                'hash' => sha1($user->email),
            ]
        );

        Mail::to($user->email)->send(
            new AccountReactivationMail($user, $url)
        );

        return back()->with(
            'success',
            'A reactivation link has been sent to your registered email.'
        );
    }

    /**
     * Reactivate Account
     */
    public function verify(User $user)
    {

        if (! hash_equals(sha1($user->email), request('hash'))) {
            abort(403);
        }

        $user->update([
            'status' => 1,
            'email_verified_at' => now(),
        ]);

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Your account has been reactivated successfully. Please login.'
            );
    }
}