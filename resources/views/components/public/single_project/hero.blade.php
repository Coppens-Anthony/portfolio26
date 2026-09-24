@props(['project', 'duration', 'isAdmin' => false])

<section class="mt-8 max-w-7xl mx-6 md:mx-16 2xl:mx-auto">
    @if(!$isAdmin)
        <x-global.link :route="route('projects')" :backArrow="true">Retour aux projets</x-global.link>
    @endif
    <div class="mx-auto w-fit my-16">
        <h2 class="font-title text-[2rem] sm:text-[2.75rem] md:text-[4rem] font-bold text-center">{{ $project->name }}</h2>
        @if($project->github || $project->link)
            <div class="flex gap-8 mt-4 w-fit mx-auto">
                @if($project->github)
                    <x-global.link :newTab="true" :route="$project->github" :arrow="true">Vers le Github
                    </x-global.link>
                @endif
                @if($project->link)
                    <x-global.link :route="$project->link" :arrow="true">Vers le site</x-global.link>
                @endif
            </div>
        @endif
    </div>
    <img src="{{ Storage::url('photos/originals/' . $project->avatar) }}"
         srcset="{{ Storage::url('photos/variants/300x100/' . $project->avatar) }} 300w,
         {{ Storage::url('photos/variants/600x300/' . $project->avatar) }} 600w,
         {{ Storage::url('photos/variants/900x600/' . $project->avatar) }} 900w,
         {{ Storage::url('photos/originals/' . $project->avatar) }} 1200w"
         sizes="(min-width: 1280px) 1280px, 100vw" alt="" class="w-full aspect-15/9 object-cover rounded-4xl">
    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 mt-16">
        <li class="bg-secondary rounded-2xl p-8 flex flex-col gap-2">
            <p>Client</p>
            <p class="font-semibold">{{ $project->client }}</p>
            <p>{{ $project->client_about }}</p>
        </li>
        <li class="bg-secondary rounded-2xl p-8 flex flex-col gap-2">
            <p>Année de production</p>
            <p class="font-semibold">{{ $project->year }}</p>
        </li>
        <li class="bg-secondary rounded-2xl p-8 flex flex-col gap-2">
            <p>Durée de production</p>
            <p class="font-semibold">{{ $duration }} mois</p>
            <p>{{ ucfirst($project->start_at->translatedFormat('F Y')) . ' - ' . ($project->end_at ? ucfirst($project->end_at->translatedFormat('F Y')) : 'En cours') }}</p>
        </li>
    </ul>
</section>
