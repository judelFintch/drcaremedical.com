<x-layouts.admin :title="$faq->exists ? 'Modifier la question' : 'Ajouter une question'">
    <form
        method="POST"
        action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}"
        class="max-w-3xl space-y-6"
    >
        @csrf
        @if ($faq->exists) @method('PUT') @endif

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input name="question_fr" label="Question (français)" :value="$faq->question_fr" required />
                <x-form.input name="question_en" label="Question (English)" :value="$faq->question_en" required />
                <x-form.textarea name="answer_fr" label="Réponse (français)" :value="$faq->answer_fr" required />
                <x-form.textarea name="answer_en" label="Réponse (English)" :value="$faq->answer_en" required />
            </div>
        </div>

        <div class="rounded-lg border border-neutral-200 bg-white p-6">
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                <x-form.input type="number" name="order" label="Ordre d'affichage" :value="$faq->order ?? 0" min="0" />
                <label class="flex items-center gap-2 pt-7 text-sm text-neutral-700">
                    <input type="checkbox" name="is_published" value="1" @checked($faq->is_published ?? true) class="h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500">
                    Publié sur le site
                </label>
            </div>
        </div>

        <div class="flex gap-3">
            <x-button type="submit">Enregistrer</x-button>
            <x-button as="a" :href="route('admin.faqs.index')" variant="secondary">Annuler</x-button>
        </div>
    </form>
</x-layouts.admin>
