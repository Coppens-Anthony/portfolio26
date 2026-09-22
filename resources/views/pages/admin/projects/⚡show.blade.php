<?php

use App\Enums\CategoriesEnum;
use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Fiche du projets')]
class extends Component {
    public Project $project;
    public string $duration = '';

    public function mount()
    {
        if ($this->project->end_at) {
            $diff = $this->project->start_at->diff($this->project->end_at);
            $this->duration = $diff->y * 12 + $diff->m + ($diff->d > 0 ? 1 : 0);
        } else {
            $this->duration = 'En cours';
        }
    }

    #[Computed]
    public function front_competencies()
    {
        return $this->project->competences()->where('category', CategoriesEnum::FRONT)->get();
    }
    #[Computed]
    public function back_competencies()
    {
        return $this->project->competences()->where('category', CategoriesEnum::BACK)->get();
    }
    #[Computed]
    public function tool_competencies()
    {
        return $this->project->competences()->where('category', CategoriesEnum::TOOL)->get();
    }

    public function edit(string $id)
    {
        return redirect(route('project.edit', $id));
    }

    public function delete(string $id)
    {
        $this->dispatch('open_modal', ['modal' => 'modals::projects.delete', 'model_id' => $id]);
    }
};
?>

<div class="relative">
    <x-public.single_project.hero :project="$project" :duration="$duration" :isAdmin="true"/>
    <div class="flex flex-col gap-32 max-w-7xl mx-6 md:mx-16 mt-32 2xl:mx-auto">
        <x-public.single_project.about :project="$project" :front_competencies="$this->front_competencies"
                                       :back_competencies="$this->back_competencies" :tool_competencies="$this->tool_competencies"/>
        <x-public.single_project.gallery :project="$project"/>
    </div>
    <div class="fixed bottom-8 right-8 flex gap-2 items-center w-fit ml-auto lg:mx-auto">
        <button type="button" wire:click="edit({{ $project->id }})"
                class="hover:scale-120 duration-200">
            <img src="{{ asset('assets/svg/edit.svg') }}" alt="Modifier le projet"
                 class="w-7 h-7 cursor-pointer">
        </button>
        <button type="button" wire:click="delete({{ $project->id }})"
                class="hover:scale-120 duration-200">
            <img src="{{ asset('assets/svg/delete.svg') }}" alt="Supprimer le projet"
                 class="w-6 h-6 cursor-pointer">
        </button>
    </div>
</div>
