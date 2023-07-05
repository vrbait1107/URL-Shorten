@props(['for', 'customMessage'])
@error($for)
    <div {{ $attributes->merge(['class' => 'text-danger mb-1']) }}>{{ $customMessage ?? $message }}</p>
@enderror
