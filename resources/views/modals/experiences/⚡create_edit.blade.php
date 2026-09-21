<?php

use App\Enums\CategoriesEnum;
use App\Enums\ExperiencesEnum;
use App\Models\Experience;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    public Experience $experience;
    public string $title = '';
    public string $date = '';
    public string $description = '';
    public string $status = '';
    public ?string $model_id = null;

    public function mount(?string $model_id)
    {
        if ($model_id) {
            $this->experience = Experience::findOrFail($model_id);
            $this->title = $this->experience->title;
            $this->date = $this->experience->date;
            $this->description = $this->experience->description;
            $this->status = $this->experience->status;
        }
    }

    #[Computed]
    public function experiencesStatus(): array
    {
        return collect(ExperiencesEnum::cases())->mapWithKeys(fn($case) => [$case->value => $case->value])->all();
    }

    public function store()
    {
        $validated = $this->validate([
            'title' => 'required|max:255',
            'date' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|exists:experiences,status',
        ]);

        $experience = Experience::create($validated);
        $this->dispatch('action_done', id: $experience->id, name: $experience->title, message: 'Expérience ajoutée avec succès !');
        $this->dispatch('close_modal');
    }

    public function update()
    {
        $validated = $this->validate([
            'title' => 'required|max:255',
            'date' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|exists:experiences,status',
        ]);

        $this->experience->update($validated);
        $this->dispatch('action_done', message: 'Expérience modifiée avec succès !');
        $this->dispatch('close_modal');
    }
};
?>

<livewire:admin.modal :modal_title="$this->model_id ? 'Modifier l\'expérience' : 'Ajouter une expérience'">
    <form wire:submit="{{ $this->model_id ? 'update' : 'store' }}" class="flex flex-col gap-4">
        @csrf
        <x-global.form.input name="title" wire:model="title" placeholder="Employé chez Brico & Co">
            Titre
        </x-global.form.input>
        <x-global.form.input name="date" wire:model="date" placeholder="Octobre 2026 - Aujourd'hui">
            Date
        </x-global.form.input>
        <x-global.form.input name="description" wire:model="description" placeholder="Développeur full-stack">
            Description
        </x-global.form.input>

        <x-global.form.select name="status" wire:model="status" :options="$this->experiencesStatus" :isDefaultOption="true"
                              :selected="$this->status">
            Statut
        </x-global.form.select>

        <div class="ml-auto w-fit flex gap-6 mt-4">
            <x-global.form.button type="button" wire:click="dispatch('close_modal')">
                Annuler
            </x-global.form.button>
            <x-global.form.button>
                {{ $this->model_id ? 'Enregistrer' : 'Ajouter' }}
            </x-global.form.button>
        </div>
    </form>
</livewire:admin.modal>
