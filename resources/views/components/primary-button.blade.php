<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-second border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-third focus:bg-third duration-300']) }}>
    {{ $slot }}
</button>
