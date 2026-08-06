@props([
    'action',
    'method' => 'DELETE',
    'title' => 'Confirmer la suppression',
    'description' => 'Cette action est définitive et ne peut pas être annulée.',
    'confirmLabel' => 'Supprimer',
    'triggerLabel' => 'Supprimer',
])

<div x-data="{ open: false }" class="inline-block">
    <button
        type="button"
        @click="open = true"
        {{ $attributes->merge(['class' => 'inline-flex items-center gap-1.5 rounded-md px-3 py-1.5 text-sm font-medium text-red-600 hover:bg-red-50']) }}
    >
        {{ $slot->isEmpty() ? $triggerLabel : $slot }}
    </button>

    <div
        x-cloak
        x-show="open"
        x-trap.noscroll="open"
        @keydown.escape.window="open = false"
        class="fixed inset-0 z-50 flex items-center justify-center bg-neutral-900/50 p-4"
        role="dialog"
        aria-modal="true"
        :aria-label="'{{ $title }}'"
    >
        <div @click.outside="open = false" x-show="open" class="w-full max-w-sm rounded-lg bg-white p-6 shadow-card">
            <h3 class="text-base font-semibold text-neutral-900">{{ $title }}</h3>
            <p class="mt-2 text-sm text-neutral-600">{{ $description }}</p>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" @click="open = false" class="rounded-md px-3 py-2 text-sm font-medium text-neutral-700 hover:bg-neutral-100">
                    Annuler
                </button>
                <form method="POST" action="{{ $action }}">
                    @csrf
                    @if (strtoupper($method) !== 'POST')
                        @method($method)
                    @endif
                    <button type="submit" class="rounded-md bg-red-600 px-3 py-2 text-sm font-medium text-white hover:bg-red-700">
                        {{ $confirmLabel }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
