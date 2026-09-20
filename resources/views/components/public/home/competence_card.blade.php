@props(['asset', 'competencies'])

<article class="bg-secondary rounded-2xl p-8">
    <div class="flex gap-4 mb-6 items-center">
        <img src="{{ $asset }}" alt="" class="w-10 h-10">
        <h3 class="text-2xl font-semibold">{{ $slot }}</h3>
    </div>
    @if($competencies->isNotEmpty())
        <ul class="flex gap-2 flex-wrap">
            @foreach($competencies as $competence)
                <li class="bg-white rounded-lg px-4 py-2 w-fit">{{ $competence->name }}</li>
            @endforeach
        </ul>
    @else
        <p>Pas de compétence</p>
    @endif
</article>
