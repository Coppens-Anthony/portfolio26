@props(['front_competencies', 'back_competencies', 'tool_competencies'])

<section class="max-w-7xl mx-6 md:mx-16 2xl:mx-auto" id="competences">
    <x-public.home.section_title>Mes compétences</x-public.home.section_title>

    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-12">
        <x-public.home.competence_card :competencies="$front_competencies" :asset="asset('assets/svg/front.svg')">
            Front-end
        </x-public.home.competence_card>
        <x-public.home.competence_card :competencies="$back_competencies" :asset="asset('assets/svg/back.svg')">
            Back-end
        </x-public.home.competence_card>
        <x-public.home.competence_card :competencies="$tool_competencies" :asset="asset('assets/svg/tool.svg')">
            Outils
        </x-public.home.competence_card>
    </div>
</section>
