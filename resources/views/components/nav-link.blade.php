@props(['active' => false])

@php
    $classes = ($active ?? false)
                ? 'nav-link active'
                : 'nav-link';
@endphp

<li class="nav-item d-none d-sm-inline-block">
    <a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
</li>
