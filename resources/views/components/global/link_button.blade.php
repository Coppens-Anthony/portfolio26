@props(['route'])

<a href="{{ $route }}" {{ $attributes }} class="bg-primary block w-full text-center md:w-fit text-white px-6 py-3 rounded-xl hover:bg-primary-hover duration-200 cursor-pointer">
    {{ $slot }}
</a>
