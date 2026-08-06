<?php

namespace App\Mail;

use App\Models\ContactRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactRequestAcknowledgement extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public ContactRequest $contactRequest) {}

    public function build(): self
    {
        $subject = $this->contactRequest->locale === 'en'
            ? 'We have received your message — DRC CARE MEDICAL'
            : 'Nous avons bien reçu votre message — DRC CARE MEDICAL';

        return $this
            ->subject($subject)
            ->view('emails.contact-acknowledgement');
    }
}
