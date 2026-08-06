<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteRequestAcknowledgement extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public QuoteRequest $quoteRequest) {}

    public function build(): self
    {
        $subject = $this->quoteRequest->locale === 'en'
            ? 'We have received your quote request — DRC CARE MEDICAL'
            : 'Nous avons bien reçu votre demande de devis — DRC CARE MEDICAL';

        return $this
            ->subject($subject)
            ->view('emails.quote-acknowledgement');
    }
}
