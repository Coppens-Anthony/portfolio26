@props(['type' => 'submit'])

<button class="bg-primary py-2 px-4 cursor-pointer text-white rounded-xl outline-none duration-200 hover:bg-primary-hover focus:bg-primary-hover hover:-translate-y-0.5 focus:-translate-y-0.5 hover:shadow-[0_8px_20px_-6px_var(--color-primary)] focus:shadow-[0_8px_20px_-6px_var(--color-primary)] active:translate-y-0" type="{{ $type }}">
    {{ $slot }}
</button>
