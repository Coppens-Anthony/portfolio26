<?php

namespace App\Http\Controllers;

use App\Enums\CategoriesEnum;
use App\Enums\ExperiencesEnum;
use App\Models\Competence;
use App\Models\Experience;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $front_competencies = Competence::where('category', CategoriesEnum::FRONT)->get();
        $back_competencies = Competence::where('category', CategoriesEnum::BACK)->get();
        $tool_competencies = Competence::where('category', CategoriesEnum::TOOL)->get();

        $professionals = Experience::where('status', ExperiencesEnum::PROFESSIONAL)->get();
        $scholars = Experience::where('status', ExperiencesEnum::SCHOLAR)->get();

        $projects = Project::with('competences')->latest()->limit(2)->get();

        $projects->each(function (Project $project) {
            $project->setRelation('competences', $project->competences->take(3));
        });

        return view('pages.public.home', compact('front_competencies', 'back_competencies', 'tool_competencies', 'projects', 'professionals', 'scholars'));
    }
}
