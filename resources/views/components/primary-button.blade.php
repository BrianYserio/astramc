<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full py-2 px-4 text-[15px] font-medium tracking-wide rounded-md text-white bg-orange-600 hover:bg-blue-700 focus:outline-none cursor-pointer']) }}>
    {{ $slot }}
</button>
