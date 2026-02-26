{{-- Reusable select with a custom chevron. Usage: <x-select-field name="..." placeholder="..."> --}}
<div class="relative">
    <select {{ $attributes->merge(['class' => 'w-full appearance-none px-3 py-2 pr-8 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 cursor-pointer transition focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100']) }}>
        @if (isset($placeholder))
            <option value="" disabled selected>{{ $placeholder }}</option>
        @endif
        {{ $slot }}
    </select>

    <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center" aria-hidden="true">
        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</div>