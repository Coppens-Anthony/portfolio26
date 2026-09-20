@props(['project'])

<li class="relative group">
    <a href="{{ route('project.show', $project) }}" class="absolute inset-0 w-full h-full z-10"></a>
    <article
        class="h-full rounded-2xl border-black border overflow-hidden flex flex-col transition-all duration-200 group-hover:-translate-y-1 group-hover:shadow-lg">

        <div class="overflow-hidden">
            <img src="{{ asset('assets/img/mockup_cv.jpg') }}" alt=""
                 class="w-full transition-transform duration-200 group-hover:scale-105">
        </div>

        <div class="p-8 flex flex-col gap-6 flex-1">
            <div class="flex justify-between items-center">
                <h3 class="text-2xl">{{ $project->name }}</h3>
                <p>{{ $project->year }}</p>
            </div>

            <p>
                {{ $project->description }}
            </p>

            <ul class="flex gap-2">
                @foreach ($project->competences as $competence)
                    <li class="py-2 px-4 bg-secondary rounded-lg">{{ $competence->name }}</li>
                @endforeach
            </ul>

            <p class="mt-auto inline-flex items-center gap-1.5 w-fit group-hover:text-primary">
                <span class="relative">
                    Voir le projet
                    <span
                        class="absolute left-0 -bottom-0.5 h-0.5 w-full bg-primary scale-x-0 origin-right transition-transform duration-200 ease-out group-hover:scale-x-100 group-hover:origin-left">
                    </span>
                </span>

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
            </p>
        </div>
    </article>
</li>
