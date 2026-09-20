@props(['project'])

<section>
    <x-public.home.section_title>Aperçus</x-public.home.section_title>
    <div>
        <ul class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <li>
                <img src="{{ asset('assets/img/mockup_cv.jpg') }}" alt="" class="rounded-4xl">
            </li>
            <li>
                <img src="{{ asset('assets/img/mockup_cv.jpg') }}" alt="" class="rounded-4xl">
            </li>
        </ul>
    </div>
</section>
