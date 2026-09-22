@props(['project'])

<section>
    <x-public.home.section_title>Aperçus</x-public.home.section_title>
    <div>
        <ul class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            @foreach($project->photos as $photo)
                <li class="border rounded-2xl md:rounded-4xl overflow-hidden">
                    <img src="{{ Storage::url('photos/originals/' . $photo->photo) }}"
                         srcset="
                                {{ Storage::url('photos/variants/300x100/' . $photo->photo) }} 300w,
                                {{ Storage::url('photos/variants/600x300/' . $photo->photo) }} 600w,
                                {{ Storage::url('photos/variants/900x600/' . $photo->photo) }} 900w,
                                {{ Storage::url('photos/originals/' . $photo->photo) }} 1200w"
                         sizes="(min-width: 900) 50vw, 100vw"
                         alt=""
                         class="aspect-video object-cover">
                </li>
            @endforeach
        </ul>
    </div>
</section>
