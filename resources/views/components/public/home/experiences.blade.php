@props(['professionals', 'scholars'])

<section id="experiences" class="max-w-7xl mx-6 md:mx-16 2xl:mx-auto 2xl:w-full">
    <x-public.home.section_title>Mon parcours</x-public.home.section_title>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <x-public.home.experience_item :experiences="$professionals">Expérience</x-public.home.experience_item>
        <x-public.home.experience_item :experiences="$scholars">Études</x-public.home.experience_item>
    </div>
</section>
