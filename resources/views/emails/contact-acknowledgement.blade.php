<x-emails.layout>
    @if ($contactRequest->locale === 'en')
        <h1 style="font-size:18px; margin:0 0 16px;">Thank you, {{ $contactRequest->name }}</h1>
        <p style="font-size:14px; line-height:1.6;">
            We have received your message and our team will get back to you shortly.
        </p>
        <p style="font-size:14px; line-height:1.6; color:#6b7785;">— The DRC CARE MEDICAL team</p>
    @else
        <h1 style="font-size:18px; margin:0 0 16px;">Merci, {{ $contactRequest->name }}</h1>
        <p style="font-size:14px; line-height:1.6;">
            Nous avons bien reçu votre message et notre équipe reviendra vers vous rapidement.
        </p>
        <p style="font-size:14px; line-height:1.6; color:#6b7785;">— L'équipe DRC CARE MEDICAL</p>
    @endif
</x-emails.layout>
