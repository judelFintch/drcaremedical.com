<x-emails.layout>
    <h1 style="font-size:18px; margin:0 0 16px;">Nouvelle demande de contact</h1>
    <table role="presentation" width="100%" style="font-size:14px; line-height:1.6;">
        <tr><td style="color:#6b7785; width:140px;">Nom</td><td>{{ $contactRequest->name }}</td></tr>
        @if ($contactRequest->institution)
            <tr><td style="color:#6b7785;">Établissement</td><td>{{ $contactRequest->institution }}</td></tr>
        @endif
        @if ($contactRequest->city)
            <tr><td style="color:#6b7785;">Ville</td><td>{{ $contactRequest->city }}</td></tr>
        @endif
        <tr><td style="color:#6b7785;">Email</td><td>{{ $contactRequest->email }}</td></tr>
        @if ($contactRequest->phone)
            <tr><td style="color:#6b7785;">Téléphone</td><td>{{ $contactRequest->phone }}</td></tr>
        @endif
        <tr><td style="color:#6b7785;">Type de besoin</td><td>{{ $contactRequest->need_type->label() }}</td></tr>
    </table>
    <p style="margin:20px 0 8px; color:#6b7785; font-size:14px;">Message</p>
    <p style="white-space:pre-line; font-size:14px; background:#f2f5f7; border-radius:8px; padding:14px;">{{ $contactRequest->message }}</p>
</x-emails.layout>
