<?php

use App\Enums\CategoriesEnum;
use App\Enums\ExperiencesEnum;
use App\Models\Experience;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Compétences')]
class extends Component {
    public string $status = '';

    #[On('action_done')]
    public function refresh(string $message = '', bool $isDeleted = false)
    {
        if ($message) {
            session()->flash($isDeleted ? 'delete' : 'success', $message);
        }
    }

    #[Computed]
    public function experiences()
    {
        return Experience::query()
            ->when(
                ExperiencesEnum::tryFrom($this->status),
                fn($q, $status) => $q->where('status', $status)
            )
            ->orderByDesc('created_at')
            ->get();
    }

    public function create()
    {
        $this->dispatch('open_modal', ['modal' => 'modals::experiences.create_edit']);
    }

    public function edit(string $id)
    {
        $this->dispatch('open_modal', ['modal' => 'modals::experiences.create_edit', 'model_id' => $id]);
    }

    public function delete(string $id)
    {
        $this->dispatch('open_modal', ['modal' => 'modals::experiences.delete', 'model_id' => $id]);
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
        <h2 class="sr-only">Tableau des expériences</h2>
        <div class="flex flex-col md:flex-row md:justify-between items-start md:items-end gap-4 md:gap-0">
            <select wire:model.live="status" class="border rounded-lg px-3 py-2 w-full md:w-fit">
                <option value="">Touts les statuts</option>
                @foreach (ExperiencesEnum::cases() as $status)
                    <option value="{{ $status }}">{{ $status }}</option>
                @endforeach
            </select>
            <x-global.form.button_link wire:click="create">Ajouter une expérience</x-global.form.button_link>
        </div>

        <x-global.table :titles="['Titre', 'Date', 'description', 'Statut', 'Actions']">
            @foreach($this->experiences as $experience)
                <tr>
                    <td class="text-center table-cell py-2">
                        {{$experience->title}}
                    </td>
                    <td class="text-center table-cell py-2">
                        {{$experience->date}}
                    </td>
                    <td class="text-center table-cell py-2">
                        {{$experience->description}}
                    </td>
                    <td class="text-center table-cell py-2">
                        {{ ucfirst($experience->status) }}
                    </td>
                    <td class="text-center table-cell py-2">
                        <div class="flex gap-2 items-center w-fit ml-auto lg:mx-auto">
                            <button type="button" wire:click="edit({{ $experience->id }})"
                                    class="hover:scale-120 duration-200">
                                <img src="{{ asset('assets/svg/edit.svg') }}" alt="Modifier l'expérience"
                                     class="w-7 h-7 cursor-pointer">
                            </button>
                            <button type="button" wire:click="delete({{ $experience->id }})"
                                    class="hover:scale-120 duration-200">
                                <img src="{{ asset('assets/svg/delete.svg') }}" alt="Supprimer l'expérience"
                                     class="w-6 h-6 cursor-pointer">
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-global.table>
    </section>
</div>
