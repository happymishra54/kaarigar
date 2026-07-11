@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label fw-semibold mb-2']) }}>

    {{ $value ?? $slot }}

</label>