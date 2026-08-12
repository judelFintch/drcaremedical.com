<x-layouts.app :title="app()->getLocale() === 'en' ? 'Legal Notice' : 'Mentions légales'">
    <section class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8">
        @if (app()->getLocale() === 'en')
            <h1 class="text-2xl font-bold text-neutral-950">Legal Notice</h1>
            <div class="prose prose-neutral mt-6 max-w-none text-sm leading-relaxed text-neutral-700">
                <h2>Publisher</h2>
                <p>
                    DRC CARE MEDICAL — {{ config('drc.company.address') }}<br>
                    Phone: {{ implode(' · ', config('drc.company.phones')) }} · Email: {{ config('drc.company.email') }}<br>
                    DRC CARE MEDICAL is the official branch of China Medical Care in the Democratic Republic of Congo.
                </p>
                <p><em>Company registration details to be completed by DRC CARE MEDICAL.</em></p>

                <h2>Hosting</h2>
                <p><em>Hosting provider details to be completed by DRC CARE MEDICAL.</em></p>

                <h2>Intellectual property</h2>
                <p>The content published on this site (texts, images, logos) is the property of DRC CARE MEDICAL or its partners, unless otherwise stated, and may not be reproduced without prior authorization.</p>

                <h2>Liability</h2>
                <p>DRC CARE MEDICAL strives to provide accurate information on this site but cannot guarantee the absence of errors or omissions.</p>
            </div>
        @else
            <h1 class="text-2xl font-bold text-neutral-950">Mentions légales</h1>
            <div class="prose prose-neutral mt-6 max-w-none text-sm leading-relaxed text-neutral-700">
                <h2>Éditeur du site</h2>
                <p>
                    DRC CARE MEDICAL — {{ config('drc.company.address') }}<br>
                    Téléphones : {{ implode(' · ', config('drc.company.phones')) }} · Email : {{ config('drc.company.email') }}<br>
                    DRC CARE MEDICAL est la branche officielle de China Medical Care en République Démocratique du Congo.
                </p>
                <p><em>Informations d'immatriculation à compléter par DRC CARE MEDICAL.</em></p>

                <h2>Hébergement</h2>
                <p><em>Informations sur l'hébergeur à compléter par DRC CARE MEDICAL.</em></p>

                <h2>Propriété intellectuelle</h2>
                <p>Le contenu publié sur ce site (textes, images, logos) est la propriété de DRC CARE MEDICAL ou de ses partenaires, sauf mention contraire, et ne peut être reproduit sans autorisation préalable.</p>

                <h2>Responsabilité</h2>
                <p>DRC CARE MEDICAL s'efforce de fournir des informations exactes sur ce site mais ne peut garantir l'absence d'erreurs ou d'omissions.</p>
            </div>
        @endif
    </section>
</x-layouts.app>
