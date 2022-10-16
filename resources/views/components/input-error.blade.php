@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 mt-2 text-xs">{{ $message }}</li>
        @endforeach
    </ul>
@endif
