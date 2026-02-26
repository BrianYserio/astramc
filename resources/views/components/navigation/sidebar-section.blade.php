{{-- resources/views/components/navigation/sidebar-section.blade.php --}}

@props(['label'])

<div class="mt-6 px-4">
    <p class="text-[11px] font-bold uppercase tracking-widest text-slate-400">
        {{ $label }}
    </p>
    <hr class="mt-1 border-slate-200" />
</div>