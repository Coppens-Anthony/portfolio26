<?php

use App\Enums\CategoriesEnum;
use App\Models\Competence;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Compétences')]
class extends Component {
    public string $category = '';

    #[On('action_done')]
    public function refresh(string $message = '', bool $isDeleted = false)
    {
        if ($message) {
            session()->flash($isDeleted ? 'delete' : 'success', $message);
        }
    }

    #[Computed]
    public function competences()
    {
        return Competence::query()
            ->when(
                CategoriesEnum::tryFrom($this->category),
                fn($q, $category) => $q->where('category', $category)
            )
            ->orderByDesc('updated_at')
            ->get();
    }

    public function create()
    {
        $this->dispatch('open_modal', ['modal' => 'modals::competencies.create_edit']);
    }

    public function edit(string $id)
    {
        $this->dispatch('open_modal', ['modal' => 'modals::competencies.create_edit', 'model_id' => $id]);
    }

    public function delete(string $id)
    {
        $this->dispatch('open_modal', ['modal' => 'modals::competencies.delete', 'model_id' => $id]);
    }

};
?>

<div>
    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('delete'))
        <div class="alert-delete">
            {{ session('delete') }}
        </div>
    @endif
    <section class="flex flex-col gap-8">
        <h2 class="sr-only">Tableau des compétences</h2>
        <div class="flex flex-col md:flex-row md:justify-between items-start md:items-end gap-4 md:gap-0">
            <select wire:model.live="category" class="border rounded-lg px-3 py-2 w-full md:w-fit">
                <option value="">Toutes les catégories</option>
                @foreach (CategoriesEnum::cases() as $category)
                    <option value="{{ $category }}">{{ $category }}</option>
                @endforeach
            </select>
            <x-global.form.button_link wire:click="create">Ajouter une compétence</x-global.form.button_link>
        </div>

        <x-global.table :titles="['Nom', 'Catégorie', 'Actions']">
            @foreach($this->competences as $competence)
                <tr>
                    <td class="text-center table-cell py-2">
                        {{$competence->name}}
                    </td>
                    <td class="text-center table-cell py-2">
                        {{ ucfirst($competence->category) }}
                    </td>
                    <td class="text-center table-cell py-2">
                        <div class="flex gap-2 items-center w-fit ml-auto lg:mx-auto">
                            <button type="button" wire:click="edit({{ $competence->id }})"
                                    class="hover:scale-120 duration-200">
                                <img src="{{ asset('assets/svg/edit.svg') }}" alt="Modifier la compétence"
                                     class="w-7 h-7 cursor-pointer">
                            </button>
                            <button type="button" wire:click="delete({{ $competence->id }})"
                                    class="hover:scale-120 duration-200">
                                <img src="{{ asset('assets/svg/delete.svg') }}" alt="Supprimer la compétence"
                                     class="w-6 h-6 cursor-pointer">
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-global.table>
    </section>
</div>
