<?php

namespace App\Services;

use App\Mail\QuoteRequestAcknowledgement;
use App\Mail\QuoteRequestNotification;
use App\Models\QuoteRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

class QuoteRequestService
{
    public function submit(array $data, ?UploadedFile $attachment = null): QuoteRequest
    {
        if ($attachment) {
            $data['attachment_path'] = $attachment->storeAs(
                'quote-attachments',
                Str::uuid().'.'.$attachment->getClientOriginalExtension(),
                'local'
            );
        }

        $quoteRequest = QuoteRequest::query()->create([
            ...$data,
            'locale' => app()->getLocale(),
        ]);

        $this->notify($quoteRequest);

        return $quoteRequest;
    }

    private function notify(QuoteRequest $quoteRequest): void
    {
        try {
            Mail::to(config('drc.notification_email'))->send(new QuoteRequestNotification($quoteRequest));
            Mail::to($quoteRequest->email)->send(new QuoteRequestAcknowledgement($quoteRequest));
        } catch (Throwable $e) {
            Log::error('Échec de l\'envoi d\'un email de demande de devis', [
                'quote_request_id' => $quoteRequest->id,
                'exception' => $e->getMessage(),
            ]);
        }
    }
}
