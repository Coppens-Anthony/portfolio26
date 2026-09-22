<?php

use App\Models\Experience;
use App\Models\Project;
use Livewire\Component;

new class extends Component {
    public Project $project;

    public function mount(string $model_id)
    {
        if ($model_id) {
            $this->project = Project::findOrFail($model_id);
        }
    }

    public function destroy()
    {
        $this->project->delete();
        return redirect(route('projects.index'));
    }
};
?>

<livewire:admin.modal modal_title="Supprimer le projet">
    <p class="mb-8">
        Êtes-vous sûr(e) de vouloir supprimer le projet "{{ $this->project->name }}" ?
    </p>

    <form wire:submit="destroy" class="flex flex-col gap-4">
        @csrf

        <div class="ml-auto w-fit flex gap-6">
            <x-global.form.button
                type="button"
                wire:click="dispatch('close_modal')">
                Annuler
            </x-global.form.button>

            <x-global.form.button>
                Supprimer
            </x-global.form.button>
        </div>
    </form>
</livewire:admin.modal>
