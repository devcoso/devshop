@php
    $classes = "text-xs text-gray-600 hover:text-lime-900";
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>