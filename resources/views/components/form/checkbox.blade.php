@props(['name', 'label', 'required' => false, 'value' => '1'])

<div>
    <label for="{{ $name }}" class="flex items-start gap-2.5 text-sm text-neutral-700">
        <input
            type="checkbox"
            id="{{ $name }}"
            name="{{ $name }}"
            value="{{ $value }}"
            @checked(old($name))
            @if ($required) required @endif
            {{ $attributes->merge(['class' => 'mt-0.5 h-4 w-4 rounded border-neutral-300 text-brand-600 focus:ring-brand-500']) }}
        >
        <span>{{ $label }} @if ($required) <span class="text-red-600">*</span> @endif</span>
    </label>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
