<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-black rounded-tl-xl rounded-tr-[50px] rounded-bl-[50px] rounded-br-xl font-semibold text-xs text-white uppercase tracking-widest active:bg-black-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150 border-2 border-primary shadow-md transition-transform duration-200 ease-in-out transform active:translate-x-1 active:translate-y-1 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50']) }}>
    {{ $slot }}
</button>
