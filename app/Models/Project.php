<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'avatar',
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

    public function photos(): hasMany
    {
        return $this->hasMany(Photo::class);
    }

    protected function casts(): array
    {
        return [
            'start_at' => 'date',
            'end_at' => 'date',
        ];
    }
}
