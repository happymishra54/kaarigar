<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AccountReactivationMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;

    public string $url;

    public function __construct(User $user, string $url)
    {
        $this->user = $user;
        $this->url = $url;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reactivate Your Kaarigar Account',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.account-reactivation',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}