<?php

use App\Enums\CategoriesEnum;
use App\Models\Competence;
use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Formulaire projet')]
class extends Component {
    public string $name;
    public string $year = '2026';
    public string $description;
    public string $about;
    public string $client;
    public string $client_about;
    public string $start_at;
    public ?string $end_at = null;
    public ?string $github = null;
    public ?string $link = null;
    public ?Project $project;
    public array $selected_competencies = [];

    public function mount(?string $model_id = null)
    {
        if ($model_id) {
            $this->project = Project::findOrFail($model_id);
            $this->name = $this->project->name;
            $this->year = $this->project->year;
            $this->description = $this->project->description;
            $this->about = $this->project->about;
            $this->client = $this->project->client;
            $this->client_about = $this->project->client_about;
            $this->start_at = $this->project->start_at->format('Y-m-d');
            $this->end_at = $this->project->end_at?->format('Y-m-d');
            $this->github = $this->project->github;
            $this->link = $this->project->link;
            $this->selected_competencies = $this->project->competences()->pluck('competences.id')->toArray();
        }
    }

    #[Computed]
    public function front_competencies()
    {
        return Competence::where('category', CategoriesEnum::FRONT)->get();
    }

    #[Computed]
    public function back_competencies()
    {
        return Competence::where('category', CategoriesEnum::BACK)->get();
    }

    #[Computed]
    public function tool_competencies()
    {
        return Competence::where('category', CategoriesEnum::TOOL)->get();
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|max:255',
            'year' => 'required|int|min:2024|max:' . now()->year,
            'description' => 'required|max:255',
            'about' => 'required',
            'client' => 'required|max:255',
            'client_about' => 'required|max:255',
            'start_at' => 'required',
            'end_at' => 'nullable|after_or_equal:start_at',
            'github' => 'nullable|max:255',
            'link' => 'nullable|max:255',
        ]);

        if (isset($this->project) && $this->project->exists) {
            $this->project->update($validated);
        } else {
            $this->project = Project::create($validated);
        }

        $this->project->competences()->sync($this->selected_competencies);

        return redirect(route('admin.project.show', $this->project->id));
    }
};
?>

<div>
    <form class="grid grid-cols-2 gap-x-12 gap-y-4" wire:submit="store">
        @csrf
        <x-global.form.input name="name" wire:model="name" placeholder="Joana-Coiffure">
            Nom
        </x-global.form.input>
        <x-global.form.input type="number" name="year" wire:model="year" placeholder="{{ now()->year }}">
            Année
        </x-global.form.input>
        <x-global.form.textarea name="description" wire:model="description" placeholder="Ce projet consiste en...">
            Description
        </x-global.form.textarea>
        <x-global.form.textarea name="about" wire:model="about" placeholder="Ce projet consiste en...">
            À propos
        </x-global.form.textarea>
        <x-global.form.input name="start_at" wire:model="start_at" type="date">
            Date de début
        </x-global.form.input>
        <x-global.form.input name="end_at" wire:model="end_at" type="date">
            Date de fin
        </x-global.form.input>
        <x-global.form.input name="client" wire:model="client" placeholder="Joana-Coiffure">
            Client
        </x-global.form.input>
        <x-global.form.input name="client_about" wire:model="client_about" placeholder="Salon de coiffure fictif">
            Information sur le client
        </x-global.form.input>
        <x-global.form.input name="github" wire:model="github">
            Github
        </x-global.form.input>
        <x-global.form.input name="link" wire:model="link">
            Lien du site
        </x-global.form.input>

        <div class="col-span-2">
            <p class="mb-2 font-medium">Compétences</p>
            <div class="grid grid-cols-3 gap-8">
                <div>
                    <p class="mb-2 text-sm text-gray-500">Front</p>
                    <div class="flex flex-col gap-2">
                        @foreach($this->front_competencies as $competence)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" wire:model="selected_competencies"
                                       value="{{ $competence->id }}">
                                {{ $competence->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <p class="mb-2 text-sm text-gray-500">Back</p>
                    <div class="flex flex-col gap-2">
                        @foreach($this->back_competencies as $competence)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" wire:model="selected_competencies"
                                       value="{{ $competence->id }}">
                                {{ $competence->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
                <div>
                    <p class="mb-2 text-sm text-gray-500">Tool</p>
                    <div class="flex flex-col gap-2">
                        @foreach($this->tool_competencies as $competence)
                            <label class="flex items-center gap-2">
                                <input type="checkbox" wire:model="selected_competencies"
                                       value="{{ $competence->id }}">
                                {{ $competence->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-2 flex justify-center mt-8">
            <x-global.form.button>
                {{ isset($this->project) && $this->project->exists ? 'Enregistrer' : 'Ajouter' }}
            </x-global.form.button>
        </div>
    </form>
</div>
