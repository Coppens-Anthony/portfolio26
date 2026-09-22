<?php

use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Projets')]
class extends Component {
    #[Computed]
    public function projects()
    {
        $projects = Project::orderByDesc('created_at')->get();

        return $projects->each(function (Project $project) {
            $project->setRelation('competences', $project->competences->take(3));
        });
    }
};
?>

<div>
    @if(session('delete'))
        <div class="alert-delete">
            {{ session('delete') }}
        </div>
    @endif
    <div class="ml-auto mb-12 w-fit">
        <x-global.link :route="route('projects.create')">Ajouter un projet</x-global.link>
    </div>
    <ul class="grid grid-cols-2 gap-12">
        @foreach($this->projects as $project)
            <x-public.project_card :project="$project" :isAdmin="true"/>
        @endforeach
    </ul>
</div>
