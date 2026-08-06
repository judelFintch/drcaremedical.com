<?php

namespace App\Services;

use App\Mail\ContactRequestAcknowledgement;
use App\Mail\ContactRequestNotification;
use App\Models\ContactRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactRequestService
{
    public function submit(array $data): ContactRequest
    {
        $contactRequest = ContactRequest::query()->create([
            ...$data,
            'locale' => app()->getLocale(),
        ]);

        $this->notify($contactRequest);

        return $contactRequest;
    }

    private function notify(ContactRequest $contactRequest): void
    {
        try {
            Mail::to(config('drc.notification_email'))->send(new ContactRequestNotification($contactRequest));
            Mail::to($contactRequest->email)->send(new ContactRequestAcknowledgement($contactRequest));
        } catch (Throwable $e) {
            Log::error('Échec de l\'envoi d\'un email de demande de contact', [
                'contact_request_id' => $contactRequest->id,
                'exception' => $e->getMessage(),
            ]);
        }
    }
}
