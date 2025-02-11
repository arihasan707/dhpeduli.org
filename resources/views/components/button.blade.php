<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white w-[100%] bg-red-500 hover:bg-red-400 focus:ring-4 focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 focus:outline-none']) }}>
    {{ $slot }}
</button>