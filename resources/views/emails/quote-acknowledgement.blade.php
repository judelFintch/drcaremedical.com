<x-emails.layout>
    @if ($quoteRequest->locale === 'en')
        <h1 style="font-size:18px; margin:0 0 16px;">Thank you, {{ $quoteRequest->name }}</h1>
        <p style="font-size:14px; line-height:1.6;">
            We have received your quote request{{ $quoteRequest->product ? ' for '.$quoteRequest->product->name_en : '' }}.
            Our team will review your needs and get back to you with a tailored proposal.
        </p>
        <p style="font-size:14px; line-height:1.6; color:#6b7785;">— The DRC CARE MEDICAL team</p>
    @else
        <h1 style="font-size:18px; margin:0 0 16px;">Merci, {{ $quoteRequest->name }}</h1>
        <p style="font-size:14px; line-height:1.6;">
            Nous avons bien reçu votre demande de devis{{ $quoteRequest->product ? ' pour '.$quoteRequest->product->name_fr : '' }}.
            Notre équipe étudie votre besoin et reviendra vers vous avec une proposition adaptée.
        </p>
        <p style="font-size:14px; line-height:1.6; color:#6b7785;">— L'équipe DRC CARE MEDICAL</p>
    @endif
</x-emails.layout>
