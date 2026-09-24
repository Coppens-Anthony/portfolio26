@props(['project', 'isAdmin' => false])

<li class="relative group">
    <a href="{{ $isAdmin ? route('admin.project.show', $project) : route('project.show', $project) }}"
       class="absolute inset-0 w-full h-full z-10 outline-none"></a>
    <article
        class="h-full rounded-2xl border-black border overflow-hidden flex flex-col transition-all duration-200 group-hover:-translate-y-1 group-hover:shadow-lg group-focus-within:-translate-y-1 group-focus-within:shadow-lg">

        <div class="overflow-hidden">
            <img src="{{ Storage::url('photos/originals/' . $project->avatar) }}"
                 srcset="{{ Storage::url('photos/variants/300x100/' . $project->avatar) }} 300w,
         {{ Storage::url('photos/variants/600x300/' . $project->avatar) }} 600w,
         {{ Storage::url('photos/variants/900x600/' . $project->avatar) }} 900w,
         {{ Storage::url('photos/originals/' . $project->avatar) }} 1200w"
                 sizes="(min-width: 1024px) calc(1280px / 3), (min-width: 768px) 50vw, 100vw"
                 class="w-full aspect-9/5 object-cover transition-transform duration-200 group-hover:scale-105 group-focus-within:scale-105"
                 alt="">
        </div>

        <div class="p-8 flex flex-col gap-6 flex-1">
            <div class="flex justify-between items-center">
                <h3 class="text-2xl">{{ $project->name }}</h3>
                <p>{{ $project->year }}</p>
            </div>

            <p>
                {{ $project->description }}
            </p>

            <ul class="flex flex-wrap gap-2">
                @foreach ($project->competences as $competence)
                    <li class="py-2 px-4 bg-secondary rounded-lg">{{ $competence->name }}</li>
                @endforeach
            </ul>

            <p class="mt-auto inline-flex items-center gap-1.5 w-fit group-hover:text-primary group-focus-within:text-primary">
                <span class="relative">
                    Voir le projet
                    <span
                        class="absolute left-0 -bottom-0.5 h-0.5 w-full bg-primary scale-x-0 origin-right transition-transform duration-200 ease-out group-hover:scale-x-100 group-hover:origin-left group-focus-within:scale-x-100 group-focus-within:origin-left">
                    </span>
                </span>

                <svg
                    class="w-4 h-4 -rotate-45 transition-transform duration-200 group-hover:rotate-0 group-focus-within:rotate-0"
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
