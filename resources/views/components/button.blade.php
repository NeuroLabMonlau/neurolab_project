<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-black rounded-xl font-semibold text-xs text-white uppercase tracking-widest active:bg-black-500 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150  shadow-md transition-transform duration-200 ease-in-out transform active:translate-x-1 active:translate-y-1 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50']) }}>
    {{ $slot }}
</button>
