<?php

namespace App\Http\Controllers;

use App\Enums\CategoriesEnum;
use App\Models\Competence;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('competences')->orderByDesc('created_at')->get();

        $projects->each(function (Project $project) {
            $project->setRelation('competences', $project->competences->take(3));
        });

        return view('pages.public.projects', compact('projects'));
    }

    public function show(Project $project)
    {
        if ($project->end_at) {
            $diff = $project->start_at->diff($project->end_at);
            $duration = $diff->y * 12 + $diff->m + ($diff->d > 0 ? 1 : 0);
        } else {
            $duration = 'En cours';
        }

        $front_competencies = $project->competences()->where('category', CategoriesEnum::FRONT)->get();
        $back_competencies = $project->competences()->where('category', CategoriesEnum::BACK)->get();
        $tool_competencies = $project->competences()->where('category', CategoriesEnum::TOOL)->get();

        $others = Project::where('id', '!=', $project->id)->orderByDesc('created_at')->latest()->limit(2)->get();

        $others->each(function (Project $project) {
            $project->setRelation('competences', $project->competences->take(3));
        });

        return view('pages.public.single_project', compact('project', 'duration', 'others', 'front_competencies', 'back_competencies', 'tool_competencies'));

    }
}
