<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center mt-2 mr-2 px-4 py-2 bg-sinusdark border border-sinusdark rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-hover focus:bg-sinusdark active:bg-sinusdark focus:outline-none focus:ring-2 focus:ring-hover focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
