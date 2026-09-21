<?php

use App\Enums\CategoriesEnum;
use App\Models\Competence;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    public Competence $competence;
    public string $name = '';
    public string $category = '';
    public ?string $model_id = null;

    public function mount(?string $model_id)
    {
        if ($model_id) {
            $this->competence = Competence::findOrFail($model_id);
            $this->name = $this->competence->name;
            $this->category = $this->competence->category;
        }
    }

    #[Computed]
    public function categories(): array
    {
        return collect(CategoriesEnum::cases())->mapWithKeys(fn($case) => [$case->value => $case->value])->all();
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|max:255|unique:competences,name',
            'category' => 'required|exists:competences,category',
        ]);

        $competence = Competence::create($validated);
        $this->dispatch('action_done', id: $competence->id, name: $competence->name, message: 'Compétence ajouté avec succès !');
        $this->dispatch('close_modal');
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|max:255|unique:competences,name,' . $this->competence->id,
            'category' => 'required|exists:competences,category',
        ]);

        $this->competence->update($validated);
        $this->dispatch('action_done', message: 'Compétence modifiée avec succès !');
        $this->dispatch('close_modal');
    }
};
?>

<livewire:admin.modal :modal_title="$this->model_id ? 'Modifier la compétence' : 'Ajouter un compétence'">
    <form wire:submit="{{ $this->model_id ? 'update' : 'store' }}" class="flex flex-col gap-4">
        @csrf
        <x-global.form.input name="name" wire:model="name" placeholder="HTML">
            Nom
        </x-global.form.input>

        <x-global.form.select name="category" wire:model="category" :options="$this->categories" :isDefaultOption="true"
                              :selected="$this->category">
            Catégorie
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
