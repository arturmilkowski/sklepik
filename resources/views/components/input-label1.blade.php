@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium w-14', 'for' => '']) }}>
    {{ $value ?? $slot }}
</label>