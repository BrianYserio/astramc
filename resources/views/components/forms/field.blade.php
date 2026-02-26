{{-- resources/views/components/forms/field.blade.php --}}

@props(['label'])

<div class="flex flex-col gap-1.5">
    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">
        {{ $label }}
    </label>
    {{ $slot }}
</div>