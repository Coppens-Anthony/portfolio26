@props(['class' => ''])

<button
    {{ $attributes }}
    class="relative group outline-none hover:text-primary duration-200 cursor-pointer {{ $class }}"
>
    {{ $slot }}

    <span
        class="absolute left-0 -bottom-0.5 h-0.5 w-full bg-primary
               scale-x-0 origin-right
               transition-transform duration-200 ease-out
               group-hover:scale-x-100 group-hover:origin-left
               [.group:focus_&]:scale-x-100 [.group:focus_&]:origin-left"
    ></span>
</button>
