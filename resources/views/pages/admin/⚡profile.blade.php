<?php

use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new #[Title('Votre profil')]
class extends Component {
    use WithFileUploads;

    public string $email;
    public string $oldPassword;
    public string $password;

    public function mount()
    {
        $this->email = $this->authUser->email;
    }

    #[Computed]
    public function authUser()
    {
        return auth()->user();
    }

    public function update()
    {
        $validated = $this->validate([
            'email' => 'required|email|unique:users,email,' . $this->authUser->id,
            'oldPassword' => 'required|min:8',
            'password' => 'nullable|min:8|different:oldPassword',
        ]);

        if (!Hash::check($validated['oldPassword'], $this->authUser->password)) {
            $this->addError('oldPassword', 'Mot de passe incorrect');
            return;
        }


        $this->authUser->update([
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $this->authUser->password
        ]);

        return redirect(route('profile'))
            ->with('success', 'Profil modifié avec succès');
    }
};
?>

<div>
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form wire:submit="update">
        <div class="flex gap-8">
            <fieldset class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full">
                <legende class="sr-only">Informations personnelles</legende>
                <x-global.form.input name="email" wire:model="email" type="email" :placeholder="$this->authUser->email"
                                     :value="$this->authUser->email">
                    Email
                </x-global.form.input>
                <x-global.form.input name="oldPassword" wire:model="oldPassword" type="password">
                    Mot de passe actuel
                </x-global.form.input>
                <x-global.form.input name="password" wire:model="password" type="password" :isRequired="false">
                    Nouveau mot de passe
                </x-global.form.input>
            </fieldset>
        </div>

        <div class="mt-8 w-fit mx-auto">
            <x-global.form.button>
                Enregistrer
            </x-global.form.button>
        </div>
    </form>
</div>
