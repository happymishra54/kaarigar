@props(['status'])

@if ($status)

    <div {{ $attributes->merge(['class' => 'alert alert-success d-flex align-items-center mb-4']) }}>

        <i class="fas fa-circle-check me-2"></i>

        <span>{{ $status }}</span>

    </div>

@endif