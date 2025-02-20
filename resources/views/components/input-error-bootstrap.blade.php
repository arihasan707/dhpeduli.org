@props(['messages'])

@if ($messages)
<div {{ $attributes->merge(['class' => 'text-sm text-red']) }}>
    @foreach ((array) $messages as $message)
    <span>{{ $message }}</span>
    @endforeach
</div>
@endif