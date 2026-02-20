@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full text-slate-900 text-sm border border-slate-300 px-4 py-3 pr-8 rounded-md outline-blue-600']) }}>
