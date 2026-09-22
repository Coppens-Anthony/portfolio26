<x-public.layout title="Portfolio - Projets">
    <section class="mt-8 max-w-7xl mx-6 md:mx-16 2xl:mx-auto">
        <h2 class="text-[4rem] mx-auto w-fit mb-16">Mes projets</h2>
        <ol class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            @foreach($projects as $project)
                <x-public.project_card :project="$project"/>
            @endforeach
        </ol>
    </section>
</x-public.layout>
