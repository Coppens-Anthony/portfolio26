@props(['projects', 'isSingle' => false])

<section class="{{ $isSingle ? '' : 'max-w-7xl mx-6 md:mx-16 2xl:mx-auto' }}">
    <div class="flex flex-col w-fit md:w-full gap-4 md:gap-0 md:flex-row md:justify-between md:items-center mb-16">
        <x-public.home.section_title class="mb-0!">Mes {{ $isSingle ? 'autres' : '' }} projets</x-public.home.section_title>

        <x-global.link :route="route('projects')" :arrow="true">
            Voir tous mes projets
        </x-global.link>
    </div>

    <ol class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        @foreach($projects as $project)
            <x-public.project_card :project="$project"/>
        @endforeach
    </ol>
    <div class="w-fit mx-auto mt-8">
        <x-global.link_button :route="route('projects')">
            Voir tous mes projets
        </x-global.link_button>
    </div>
</section>
