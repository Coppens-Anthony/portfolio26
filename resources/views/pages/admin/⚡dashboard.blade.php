<?php

use App\Models\Competence;
use App\Models\Experience;
use App\Models\Project;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

new #[Title('Dashboard')]
class extends Component {
    #[Computed]
    public function stats(): array
    {
        return [
            ['label' => 'Compétences', 'count' => Competence::count(), 'route' => 'competencies.index'],
            ['label' => 'Projets', 'count' => Project::count(), 'route' => 'projects.index'],
            ['label' => 'Expériences', 'count' => Experience::count(), 'route' => 'scholar.index'],
        ];
    }
};
?>

<div class="p-8">
    <h1 class="text-[2rem] mb-8">Dashboard</h1>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach ($this->stats as $stat)
            <a href="{{ route($stat['route']) }}" wire:navigate
               class="p-6 rounded-2xl shadow-[0_0_10px_rgba(0,0,0,0.25)] hover:scale-[1.02] transition">
                <p class="text-sm">{{ $stat['label'] }}</p>
                <p class="text-[2rem] font-semibold">{{ $stat['count'] }}</p>
            </a>
        @endforeach
    </div>
</div>
