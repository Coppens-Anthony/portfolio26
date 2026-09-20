<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'description',
        'about',
        'client',
        'client_about',
        'github',
        'link',
        'start_at',
        'end_at',
    ];

    public function competences(): BelongsToMany
    {
        return $this->belongsToMany(Competence::class, 'project_competence', 'project_id', 'competence_id');
    }

    protected function casts(): array
    {
        return [
            'start_at' => 'date',
            'end_at' => 'date',
        ];
    }
}
