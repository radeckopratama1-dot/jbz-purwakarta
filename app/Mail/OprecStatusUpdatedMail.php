<?php

namespace App\Mail;

use App\Models\Applicant;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OprecStatusUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Applicant $applicant
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pembaruan Status Seleksi Oprec JBZ Kabupaten Purwakarta — ' . $this->applicant->registration_code,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.oprec-status',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
