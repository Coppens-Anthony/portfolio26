@props(['route', 'isActive' => null, 'arrow' => false, 'class' => ''])

<a href="{{ $route }}"
   {{ $attributes }}
   class="relative inline-flex items-center gap-1.5 group hover:text-primary duration-200 {{ $isActive ? 'text-primary font-bold' : '' }} {{ $class }}">

    {{ $slot }}

    @if($arrow)
        <svg
            class="w-4 h-4 -rotate-45 transition-transform duration-200 group-hover:rotate-0"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M5 12h14"/>
            <path d="M13 6l6 6-6 6"/>
        </svg>
    @endif

    <span class="{{ $isActive
        ? 'absolute bg-primary left-0 -bottom-0.5 h-0.5 w-full scale-x-100 origin-left'
        : 'absolute bg-primary left-0 -bottom-0.5 h-0.5 w-full scale-x-0 origin-right transition-transform duration-200 ease-out group-hover:origin-left group-hover:scale-x-100' }}">
    </span>
</a>
