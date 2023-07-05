@props(['status'])

@if ($status)
    <div id='session-alert' {{ $attributes->merge(['class' => 'alert alert-dismissible fade show']) }}>
        {{ $status }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif