<?php

namespace App\Http\Controllers;

use App\Enums\CategoriesEnum;
use App\Enums\ExperiencesEnum;
use App\Mails\ContactForm;
use App\Models\Competence;
use App\Models\Experience;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required|max:5000',
        ]);

        try {
            Mail::send(new ContactForm($validated));
        } catch (Exception $exception) {
            report($exception);

            return redirect(route('home').'#contact')->with('error', true);
        }

        return redirect(route('home').'#contact')->with('success', true);
    }
}
