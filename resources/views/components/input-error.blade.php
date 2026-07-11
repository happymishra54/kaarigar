@props(['messages'])

@if ($messages)

    <div {{ $attributes->merge(['class' => 'mt-2']) }}>

        @foreach ((array) $messages as $message)

            <div class="alert alert-danger py-2 px-3 mb-2 rounded-3">

                <i class="fas fa-circle-exclamation me-2"></i>

                {{ $message }}

            </div>

        @endforeach

    </div>

@endif