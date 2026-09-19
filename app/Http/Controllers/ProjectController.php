<?php

namespace App\Http\Controllers;

use App\Enums\CategoriesEnum;
use App\Models\Competence;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderByDesc('created_at')->get();

        return view('pages.public.projects', compact('projects'));
    }
}
