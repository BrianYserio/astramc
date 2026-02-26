@props(['type' => 'button'])

<button type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'inline-flex items-center justify-center
                    w-6 h-6 text-red-500 bg-red-100 rounded-md transition
                    hover:bg-red-500 hover:text-white'
    ]) }}>
    {{ $slot }}
</button>