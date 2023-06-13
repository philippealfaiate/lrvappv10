@props([
    //
])

@php
    $class = '';
@endphp

<form {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</form>
