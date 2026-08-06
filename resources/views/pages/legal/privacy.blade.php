<x-layouts.app :title="app()->getLocale() === 'en' ? 'Privacy Policy' : 'Politique de confidentialité'">
    <section class="mx-auto max-w-3xl px-4 py-16 sm:px-6 lg:px-8">
        @if (app()->getLocale() === 'en')
            <h1 class="text-2xl font-bold text-neutral-950">Privacy Policy</h1>
            <div class="prose prose-neutral mt-6 max-w-none text-sm leading-relaxed text-neutral-700">
                <h2>Data collected</h2>
                <p>When you submit the contact or quote request forms, we collect the information you provide: name, institution, city, email, phone, and your message.</p>

                <h2>Purpose</h2>
                <p>This information is used solely to process your request and to respond to you. It is not sold or transferred to third parties for commercial purposes.</p>

                <h2>Retention</h2>
                <p>Your data is kept for the time necessary to process your request and to maintain a record of exchanges with DRC CARE MEDICAL.</p>

                <h2>Your rights</h2>
                <p>You may request access to, correction of, or deletion of your data by contacting {{ config('drc.company.email') }}.</p>
            </div>
        @else
            <h1 class="text-2xl font-bold text-neutral-950">Politique de confidentialité</h1>
            <div class="prose prose-neutral mt-6 max-w-none text-sm leading-relaxed text-neutral-700">
                <h2>Données collectées</h2>
                <p>Lorsque vous soumettez les formulaires de contact ou de demande de devis, nous collectons les informations que vous fournissez : nom, établissement, ville, email, téléphone et votre message.</p>

                <h2>Finalité</h2>
                <p>Ces informations sont utilisées uniquement pour traiter votre demande et vous répondre. Elles ne sont ni vendues ni transmises à des tiers à des fins commerciales.</p>

                <h2>Conservation</h2>
                <p>Vos données sont conservées le temps nécessaire au traitement de votre demande et au suivi des échanges avec DRC CARE MEDICAL.</p>

                <h2>Vos droits</h2>
                <p>Vous pouvez demander l'accès, la correction ou la suppression de vos données en contactant {{ config('drc.company.email') }}.</p>
            </div>
        @endif
    </section>
</x-layouts.app>
