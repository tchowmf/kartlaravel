<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    private $token = '';
    private $userDetails;

    /**
     * Create a new message instance.
     */
    public function __construct($token, $userDetails)
    {
        $this->token = $token;
        $this->userDetails = $userDetails;
    }

    public function build()
    {
        $verificationLink = URL::temporarySignedRoute(
            'verification', // Nome da rota de verificação
            now()->addMinutes(30), // Tempo de expiração do link (30 minutos)
            ['token' => $this->token] // Parâmetros para a rota de verificação
        );

        return $this->view('mail.email-verification')
            ->with([
                'verificationLink' => $verificationLink,
                'userDetails' => $this->userDetails,
            ])
            ->subject('Confirme seu e-mail');
    }

    /*
     * Get the message envelope.

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Verification',
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
