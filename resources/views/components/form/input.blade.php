@props(['name', 'label', 'type' => 'text', 'required' => false, 'help' => null, 'value' => null])

<div>
    <label for="{{ $name }}" class="block text-sm font-medium text-neutral-800">
        {{ $label }} @if ($required) <span class="text-red-600">*</span> @endif
    </label>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        @if ($required) required @endif
        {{ $attributes->merge(['class' => 'mt-1.5 block w-full rounded-md border border-neutral-300 px-3.5 py-2.5 text-sm text-neutral-900 placeholder:text-neutral-400 focus:border-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-100 '.($errors->has($name) ? 'border-red-400' : '')]) }}
    >
    @if ($help)
        <p class="mt-1 text-xs text-neutral-500">{{ $help }}</p>
    @endif
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
