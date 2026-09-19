@props(['type' => 'submit'])

<button class="bg-primary hover:bg-primary-hover py-2 px-4 cursor-pointer text-white rounded-xl" type="{{ $type }}">
    {{ $slot }}
</button>
