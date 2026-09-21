<?php

use App\Models\Competence;
use Livewire\Component;

new class extends Component {
    public Competence $competence;

    public function mount(string $model_id)
    {
        if ($model_id) {
            $this->competence = Competence::findOrFail($model_id);
        }
    }

    public function destroy()
    {
        $this->competence->delete();
        $this->dispatch('action_done', message: 'Coméptence supprimée avec succès !', isDeleted: true);
        $this->dispatch('close_modal');
    }
};
?>

<livewire:admin.modal modal_title="Supprimer la compétence">
    <p class="mb-8">
        Êtes-vous sûr(e) de vouloir supprimer la compétence "{{ $this->competence->name }}" ?
    </p>

    <form wire:submit="destroy" class="flex flex-col gap-4">
        @csrf

        <div class="ml-auto w-fit flex gap-6">
            <x-global.form.button
                type="button"
                wire:click="dispatch('close_modal')">
                Annuler
            </x-global.form.button>

            <x-global.form.button title="Supprimer la compétence">
                Supprimer
            </x-global.form.button>
        </div>
    </form>
</livewire:admin.modal>
