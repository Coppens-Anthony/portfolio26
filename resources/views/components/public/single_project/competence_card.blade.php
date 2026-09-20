@props(['competencies'])

@if($competencies->isNotEmpty())
    <div>
        <p class="font-semibold mb-6">{{ $slot }}</p>
        <ul class="flex gap-2 flex-wrap">
            @foreach($competencies as $competence)
                <li class="bg-white p-2 rounded-lg w-fit">
                    {{ $competence->name }}
                </li>
            @endforeach
        </ul>
    </div>
@endif
