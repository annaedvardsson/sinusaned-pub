<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center mt-2 mr-2 px-4 py-2 bg-sinuslight border border-sinusdark rounded-md font-semibold text-xs text-sinusdark uppercase tracking-widest shadow-sm hover:bg-hover focus:bg-sinuslight active:bg-sinuslight focus:outline-none focus:ring-2 focus:ring-hover focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
