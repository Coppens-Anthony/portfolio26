<x-public.layout title="Portfolio - {{ $project->name }}">
    <x-public.single_project.hero :project="$project" :duration="$duration"/>
    <div class="flex flex-col gap-32 max-w-7xl mx-6 md:mx-16 mt-32 2xl:mx-auto">
        <x-public.single_project.about :project="$project" :front_competencies="$front_competencies" :back_competencies="$back_competencies" :tool_competencies="$tool_competencies"/>
        <x-public.single_project.gallery :project="$project"/>
        <x-public.home.projects :projects="$others" :isSingle="true"/>
        <x-public.single_project.contact/>
    </div>
</x-public.layout>
