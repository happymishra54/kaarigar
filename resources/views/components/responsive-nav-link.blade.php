@props(['active'])

@php
$classes = ($active ?? false)
    ? 'd-block w-100 px-3 py-2 text-start fw-semibold text-primary bg-light border-start border-primary'
    : 'd-block w-100 px-3 py-2 text-start fw-semibold text-secondary';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>