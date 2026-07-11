@props(['active'])

@php
$classes = ($active ?? false)
    ? 'nav-link active fw-semibold text-primary border-bottom border-primary'
    : 'nav-link text-secondary';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>