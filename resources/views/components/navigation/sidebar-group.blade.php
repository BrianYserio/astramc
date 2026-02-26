{{-- resources/views/components/navigation/sidebar-group.blade.php --}}

@props(['label', 'collapsed' => false])

<div class="mt-6">
    <button
        type="button"
        class="flex items-center w-full cursor-pointer group collapsible-toggle"
        aria-expanded="{{ $collapsed ? 'false' : 'true' }}"
    >
        <span class="text-slate-800 group-hover:text-slate-900 text-[15px] font-semibold px-4 flex-1 text-left">
            {{ $label }}
        </span>
        <x-icons.ArrowIcon />
    </button>

    <ul class="space-y-1 mt-2 pl-4 overflow-hidden transition-all duration-300 {{ $collapsed ? 'max-h-0' : 'max-h-[500px]' }}">
        {{ $slot }}
    </ul>
</div>