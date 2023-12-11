<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $token = '';
    private $userDetails;

    public function __construct($token, $userDetails)
    {
        $this->token = $token;
        $this->userDetails = $userDetails;
    }

    private function censorEmail($email)
    {
        $parts = explode('@', $email);
        $username = $parts[0];
        $domain = $parts[1];

        $censoredUsername = substr($username, 0, 2) . str_replace('-', strlen($username) - 3, '*') . substr($username, -1);

        return $censoredUsername . '@' . $domain;
    }

    public function build()
    {
        $resetLink = route('password.reset', $this->token);

        $censoredEmail = $this->censorEmail($this->userDetails['email']);

        return $this->view('mail.reset-password')
                ->with([
                    'resetLink' => $resetLink,
                    'censoredEmail' => $censoredEmail,
                    'userDetails' => $this->userDetails,
                ]);
    }

    /*
     * Get the message envelope.

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Reset Password Mail',
        );
    }


     * Get the message content definition.

    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }


     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>

    public function attachments(): array
    {
        return [];
    }*/
}
