<x-emails.layout>
    <h1 style="font-size:18px; margin:0 0 16px;">Nouvelle demande de devis</h1>
    <table role="presentation" width="100%" style="font-size:14px; line-height:1.6;">
        @if ($quoteRequest->product)
            <tr><td style="color:#6b7785; width:140px;">Produit</td><td>{{ $quoteRequest->product->name_fr }}</td></tr>
        @endif
        <tr><td style="color:#6b7785;">Nom</td><td>{{ $quoteRequest->name }}</td></tr>
        @if ($quoteRequest->institution)
            <tr><td style="color:#6b7785;">Établissement</td><td>{{ $quoteRequest->institution }}</td></tr>
        @endif
        @if ($quoteRequest->role)
            <tr><td style="color:#6b7785;">Fonction</td><td>{{ $quoteRequest->role }}</td></tr>
        @endif
        @if ($quoteRequest->city)
            <tr><td style="color:#6b7785;">Ville</td><td>{{ $quoteRequest->city }}</td></tr>
        @endif
        <tr><td style="color:#6b7785;">Email</td><td>{{ $quoteRequest->email }}</td></tr>
        @if ($quoteRequest->phone)
            <tr><td style="color:#6b7785;">Téléphone</td><td>{{ $quoteRequest->phone }}</td></tr>
        @endif
        @if ($quoteRequest->quantity)
            <tr><td style="color:#6b7785;">Quantité</td><td>{{ $quoteRequest->quantity }}</td></tr>
        @endif
        @if ($quoteRequest->deadline)
            <tr><td style="color:#6b7785;">Délai souhaité</td><td>{{ $quoteRequest->deadline }}</td></tr>
        @endif
    </table>
    <p style="margin:20px 0 8px; color:#6b7785; font-size:14px;">Message</p>
    <p style="white-space:pre-line; font-size:14px; background:#f2f5f7; border-radius:8px; padding:14px;">{{ $quoteRequest->message }}</p>
    @if ($quoteRequest->attachment_path)
        <p style="margin-top:16px; font-size:14px;">Pièce jointe fournie par le demandeur (voir l'administration).</p>
    @endif
</x-emails.layout>
