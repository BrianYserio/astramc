{{-- resources/views/components/navigation/sidebar-sub-link.blade.php --}}

@props(['href' => "#", 'label' => ""])

<li>
    
    <a  href="{{ $href }}"
        {{ $attributes->merge(['class' => 'text-slate-800 hover:text-slate-900 font-medium transition-all text-[15px] flex items-center hover:bg-[#efefef] rounded-md px-4 py-2']) }}
    >
        <x-icons.SubArrowIcon />
        <span>{{$label}}</span>
    </a>
</li>