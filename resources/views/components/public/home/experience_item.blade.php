@props(['experiences'])

<section>
    <h3 class="font-semibold text-2xl mb-6">{{ $slot }}</h3>
    <ol class="flex flex-col gap-6">
        @foreach($experiences as $experience)
            <li class="pb-6 border-b border-black">
                <article>
                    <div class="flex flex-col gap-4 md:flex-row justify-between mb-2">
                        <h4>{{ $experience->title }}</h4>
                        <p>{{ $experience->date }}</p>
                    </div>
                    <small class="italic">{{ $experience->description }}</small>
                </article>
            </li>
        @endforeach
    </ol>
</section>
