<button {{ $attributes->merge(['type' => 'submit', 'class' => ' w-full justify-center inline-flex items-center px-4 py-2 bg-lime-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-lime-700 active:bg-lime-900 focus:outline-none focus:border-lime-900 focus:ring ring-lime-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
