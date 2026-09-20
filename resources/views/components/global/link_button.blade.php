@props(['route'])

<a href="{{ $route }}" {{ $attributes }} class="bg-primary block w-full text-center md:w-fit text-white px-6 py-3 rounded-xl outline-none duration-200 cursor-pointer hover:bg-primary-hover focus:bg-primary-hover hover:-translate-y-0.5 focus:-translate-y-0.5 hover:shadow-[0_8px_20px_-6px_var(--color-primary)] focus:shadow-[0_8px_20px_-6px_var(--color-primary)] active:translate-y-0">
    {{ $slot }}
</a>
