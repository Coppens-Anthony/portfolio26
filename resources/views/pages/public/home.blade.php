<x-public.layout title="Portfolio - Accueil">
    <div class="flex flex-col gap-32">
        <x-public.home.hero/>
        <x-public.home.competencies :front_competencies="$front_competencies" :back_competencies="$back_competencies"
                                    :tool_competencies="$tool_competencies"/>
        <x-public.home.projects :projects="$projects"/>
        <x-public.home.experiences :professionals="$professionals" :scholars="$scholars"/>
        <x-public.home.contact/>
    </div>
</x-public.layout>
