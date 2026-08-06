@props(['name', 'label', 'current' => null, 'help' => null])

<div x-data="{ preview: null, onChange(e) { const file = e.target.files[0]; this.preview = file ? URL.createObjectURL(file) : null; } }">
    <label for="{{ $name }}" class="block text-sm font-medium text-neutral-800">{{ $label }}</label>

    <div class="mt-2 flex items-center gap-4">
        <div class="flex h-20 w-20 shrink-0 items-center justify-center overflow-hidden rounded-md border border-neutral-200 bg-neutral-50">
            <template x-if="preview">
                <img :src="preview" alt="" class="h-full w-full object-cover">
            </template>
            <template x-if="!preview">
                @if ($current)
                    <img src="{{ $current }}" alt="" class="h-full w-full object-cover">
                @else
                    <span class="text-xs text-neutral-400">Aucune image</span>
                @endif
            </template>
        </div>

        <input
            type="file"
            id="{{ $name }}"
            name="{{ $name }}"
            accept="image/png,image/jpeg,image/webp"
            @change="onChange"
            {{ $attributes->merge(['class' => 'block w-full text-sm text-neutral-600 file:mr-4 file:rounded-md file:border-0 file:bg-brand-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-brand-700 hover:file:bg-brand-100']) }}
        >
    </div>

    @if ($help)
        <p class="mt-1 text-xs text-neutral-500">{{ $help }}</p>
    @endif

    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
