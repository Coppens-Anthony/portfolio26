@props(['project', 'front_competencies', 'back_competencies', 'tool_competencies'])

<section>
    <x-public.home.section_title>À propos</x-public.home.section_title>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <p>{{ $project->about }}</p>
        <aside class="bg-secondary rounded-4xl p-8 flex flex-col gap-6">
            <h3 class="sr-only">Technologies utilisées</h3>
                <x-public.single_project.competence_card :competencies="$front_competencies">Front-end</x-public.single_project.competence_card>
                <x-public.single_project.competence_card :competencies="$back_competencies">Back-end</x-public.single_project.competence_card>
                <x-public.single_project.competence_card :competencies="$tool_competencies">Outils</x-public.single_project.competence_card>
        </aside>
    </div>
</section>
