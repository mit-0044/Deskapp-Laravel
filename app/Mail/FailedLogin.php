<?php

namespace App\Mail;

use App\Models\AuthenticationLog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class FailedLogin extends Mailable
{
    use Queueable, SerializesModels;
    public $authenticationLog;


    /**
     * Create a new message instance.
     */
    public function __construct(AuthenticationLog $authenticationLog)
    {
        $this->authenticationLog = $authenticationLog;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Failed Login',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'vendor.authentication-log.emails.failed',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->subject(__('A failed login to your account'))
            ->markdown('authentication-log::emails.failed', [
                'account' => $notifiable,
                'time' => $this->authenticationLog->login_at,
                'ipAddress' => $this->authenticationLog->ip_address,
                'browser' => $this->authenticationLog->user_agent,
                'location' => $this->authenticationLog->location,
            ]);
    }
}
