@props(['class' => ''])

<h2 class="text-[2rem] font-title flex items-center gap-4 w-fit mb-16 {{ $class }}">
                <span
                    class="w-6 h-6 rounded-full shrink-0 bg-primary shadow-[0_0_20px_-4px_var(--color-primary),0_0_8px_-1px_var(--color-primary)] scale-x-110"></span>
    {{ $slot }}
</h2>
