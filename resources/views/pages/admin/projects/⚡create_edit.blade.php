<?php

use App\Enums\CategoriesEnum;
use App\Jobs\ProcessUploadedPhoto;
use App\Models\Competence;
use App\Models\Photo;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

new #[Title('Formulaire projet')]
class extends Component {
    use WithFileUploads;

    public string $name = '';
    public string $year = '2026';
    public string $description = '';
    public string $about = '';
    public string $client = '';
    public string $client_about = '';
    public string $start_at = '';
    public ?string $end_at = null;
    public ?string $github = null;
    public ?string $link = null;
    public $avatar = null;
    public array $photos = [];
    public $existing_photos = [];
    public ?Project $project = null;
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
            $this->existing_photos = $this->project->photos()->get();
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

    public function removeNewPhoto(int $index)
    {
        unset($this->photos[$index]);
        $this->photos = array_values($this->photos);
    }

    public function removeExistingPhoto(int $photoId)
    {
        $photo = Photo::find($photoId);
        if ($photo && $this->project && $photo->project_id === $this->project->id) {
            $photo->delete();
            $this->existing_photos = $this->project->photos()->get();
        }
    }

    public function store()
    {
        $isEditing = isset($this->project) && $this->project->exists;

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
            'avatar' => ($isEditing ? 'nullable' : 'required') . '|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'photos' => 'nullable|array',
            'photos.*' => 'mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $disk = config('filesystems.default');
        $projectData = collect($validated)->except(['avatar', 'photos'])->toArray();

        if ($this->avatar) {
            $avatarFileName = uniqid() . '.' . config('photos.picture_type');
            $avatarPath = $this->avatar->storeAs(
                config('photos.original_path'),
                $avatarFileName,
                $disk
            );
            $projectData['avatar'] = $avatarFileName;
            ProcessUploadedPhoto::dispatchSync($avatarPath, $avatarFileName);
        }

        if ($isEditing) {
            $this->project->update($projectData);
        } else {
            $this->project = Project::create($projectData);
        }

        $this->project->competences()->sync($this->selected_competencies);

        foreach ($this->photos as $photo) {
            $newFileName = uniqid() . '.' . config('photos.picture_type');
            $fullPathToOriginal = $photo->storeAs(
                config('photos.original_path'),
                $newFileName,
                $disk
            );

            ProcessUploadedPhoto::dispatchSync($fullPathToOriginal, $newFileName);

            Photo::create([
                'photo' => $newFileName,
                'project_id' => $this->project->id,
            ]);
        }

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
        <x-global.form.input name="end_at" wire:model="end_at" type="date" :isRequired="false">
            Date de fin
        </x-global.form.input>
        <x-global.form.input name="client" wire:model="client" placeholder="Joana-Coiffure">
            Client
        </x-global.form.input>
        <x-global.form.input name="client_about" wire:model="client_about" placeholder="Salon de coiffure fictif">
            Information sur le client
        </x-global.form.input>
        <x-global.form.input name="github" wire:model="github" :isRequired="false">
            Github
        </x-global.form.input>
        <x-global.form.input name="link" wire:model="link" :isRequired="false">
            Lien du site
        </x-global.form.input>

        {{-- Avatar --}}
        <div class="col-span-2">
            <p class="mb-2 font-medium">Mockup</p>
            <div class="flex items-center gap-4">
                @if($avatar)
                    <img src="{{ $avatar->temporaryUrl() }}" alt="Mockup" class="w-24 h-24 object-cover rounded">
                @elseif(isset($this->project) && $this->project->avatar)
                    <img src="{{ Storage::url(config('photos.original_path') . '/' . $this->project->avatar) }}"
                         alt="Mockup actuel" class="w-24 h-24 object-cover rounded">
                @endif
                <label class="cursor-pointer text-sm text-blue-600 hover:underline">
                    {{ $avatar || (isset($this->project) && $this->project->avatar) ? 'Changer le mockup' : 'Choisir un mockup' }}
                    <input type="file" wire:model="avatar" class="hidden">
                </label>
            </div>
            @error('avatar') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Gallerie --}}
        <div class="col-span-2">
            <p class="mb-2 font-medium">Photos de gallerie</p>

            <div class="grid grid-cols-4 gap-4 mb-3">
                @foreach($existing_photos as $existingPhoto)
                    <div class="relative">
                        <img src="{{ Storage::url(config('photos.original_path') . '/' . $existingPhoto->photo) }}"
                             alt="Photo du projet" class="w-full h-24 object-cover rounded">
                        <button type="button" wire:click="removeExistingPhoto({{ $existingPhoto->id }})"
                                class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-5 h-5 text-xs leading-none">
                            ✕
                        </button>
                    </div>
                @endforeach

                @foreach($photos as $index => $newPhoto)
                    <div class="relative">
                        <img src="{{ $newPhoto->temporaryUrl() }}" alt="Nouvelle photo"
                             class="w-full h-24 object-cover rounded ring-2 ring-blue-400">
                        <button type="button" wire:click="removeNewPhoto({{ $index }})"
                                class="absolute top-1 right-1 bg-red-600 text-white rounded-full w-5 h-5 text-xs leading-none">
                            ✕
                        </button>
                    </div>
                @endforeach

                <label class="flex items-center justify-center h-24 border-2 border-dashed border-gray-300 rounded cursor-pointer text-gray-400 hover:border-gray-400 text-sm">
                    + Ajouter
                    <input type="file" wire:model="photos" multiple class="hidden">
                </label>
            </div>
            @error('photos') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            @error('photos.*') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

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
