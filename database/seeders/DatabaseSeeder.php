<?php

namespace Database\Seeders;

use App\Enums\CategoriesEnum;
use App\Enums\ExperiencesEnum;
use App\Models\Competence;
use App\Models\Experience;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $competencies = [
            ['name' => 'HTML', 'category' => CategoriesEnum::FRONT],
            ['name' => 'CSS', 'category' => CategoriesEnum::FRONT],
            ['name' => 'JavaScript', 'category' => CategoriesEnum::FRONT],
            ['name' => 'TypeScript', 'category' => CategoriesEnum::FRONT],
            ['name' => 'Blade', 'category' => CategoriesEnum::FRONT],
            ['name' => 'Dart', 'category' => CategoriesEnum::FRONT],
            ['name' => 'Flutter', 'category' => CategoriesEnum::FRONT],
            ['name' => 'Tailwind CSS', 'category' => CategoriesEnum::FRONT],
            ['name' => 'Alpine.Js', 'category' => CategoriesEnum::FRONT],

            ['name' => 'PHP', 'category' => CategoriesEnum::BACK],
            ['name' => 'Laravel', 'category' => CategoriesEnum::BACK],
            ['name' => 'Livewire', 'category' => CategoriesEnum::BACK],
            ['name' => 'MySQL', 'category' => CategoriesEnum::BACK],
            ['name' => 'SQLite', 'category' => CategoriesEnum::BACK],

            ['name' => 'Figma', 'category' => CategoriesEnum::TOOL],
            ['name' => 'Git', 'category' => CategoriesEnum::TOOL],
            ['name' => 'Illustrator', 'category' => CategoriesEnum::TOOL],
            ['name' => 'Photoshop', 'category' => CategoriesEnum::TOOL],
            ['name' => 'PhpStorm', 'category' => CategoriesEnum::TOOL],
            ['name' => 'Vs Code', 'category' => CategoriesEnum::TOOL],
            ['name' => 'Herd', 'category' => CategoriesEnum::TOOL],
            ['name' => 'Github', 'category' => CategoriesEnum::TOOL],
            ['name' => 'TablePlus', 'category' => CategoriesEnum::TOOL],
            ['name' => 'Laravel Cloud', 'category' => CategoriesEnum::TOOL],
        ];

        foreach ($competencies as $competence) {
            Competence::create([
                'name' => $competence['name'],
                'category' => $competence['category'],
            ]);
        }

        $experiences = [
            ['title' => 'Stage chez Fidelo Agency', 'date' => 'Février - Avril 2026', 'description' => 'Développeur full-stack', 'status' => ExperiencesEnum::PROFESSIONAL],
            ['title' => 'Étudiant au GP de Spa-Francorchamps', 'date' => 'Juillet 2025, 2026', 'description' => 'Gestion d’un magasin', 'status' => ExperiencesEnum::PROFESSIONAL],
            ['title' => 'Récolte de poires', 'date' => 'Août et Septembre 2022', 'description' => 'Centre Fruitier Wallon', 'status' => ExperiencesEnum::PROFESSIONAL],

            ['title' => 'Bachelier en techniques graphiques', 'date' => '2022 - 2026', 'description' => 'Option web', 'status' => ExperiencesEnum::SCHOLAR],
            ['title' => 'Lycée et Collège Sainte Croix et notre Dame', 'date' => '2016 - 2022', 'description' => 'CE1D et CESS', 'status' => ExperiencesEnum::SCHOLAR],
        ];

        foreach ($experiences as $experience) {
            Experience::create([
                'title' => $experience['title'],
                'date' => $experience['date'],
                'description' => $experience['description'],
                'status' => $experience['status'],
            ]);
        }

        $projects = [
            ['name' => 'Joana-Coiffure', 'year' => 2026, 'description' => 'Projet de fin d’études pour un salon de coiffure fictif. Système de prise de rendez-vous intégré ainsi qu’une gestion interne pour les membres du salon.', 'about' => 'Projet de fin d’études pour un salon de coiffure fictif. Système de prise de rendez-vous intégré ainsi qu’une gestion interne pour les membres du salon.', 'client' => 'Joana-Coiffure', 'client_about' => 'Salon de coiffure fictif', 'github' => 'https://github.com/Coppens-Anthony/Joana-coiffure', 'link' => null, 'start_at' => 10 - 05 - 2026, 'end_at' => 30 - 11 - 2026],
            ['name' => 'Fidelo Sales', 'year' => 2026, 'description' => 'Projet réalisé lors de mon stage chez Fidelo Agency. C’est une application web qui sert à gérer les devis et factures pour ses clients. Les devis sont ajustables pour le client qui peut sélectionner ou non des options.', 'about' => 'Projet réalisé lors de mon stage chez Fidelo Agency. C’est une application web qui sert à gérer les devis et factures pour ses clients. Les devis sont ajustables pour le client qui peut sélectionner ou non des options.', 'client' => 'Fidelo Agency', 'client_about' => 'Outil destiné à l\'agence', 'github' => null, 'link' => null, 'start_at' => 10 - 02 - 2026, 'end_at' => 30 - 04 - 2026],
            ['name' => 'Les pattes heureuses', 'year' => 2025, 'description' => 'Projet réalisé lors de mon stage chez Fidelo Agency. C’est une application web qui sert à gérer les devis et factures pour ses clients. Les devis sont ajustables pour le client qui peut sélectionner ou non des options.', 'about' => 'Projet réalisé lors de mon stage chez Fidelo Agency. C’est une application web qui sert à gérer les devis et factures pour ses clients. Les devis sont ajustables pour le client qui peut sélectionner ou non des options.', 'client' => 'Les pattes heureuses', 'client_about' => 'Refuge animalier fictif', 'github' => 'https://github.com/Coppens-Anthony/refuge-animalier', 'link' => null, 'start_at' => 10 - 11 - 2025, 'end_at' => 02 - 01 - 2026],
            ['name' => 'Le Vieux Moulin', 'year' => 2025, 'description' => 'Projet réalisé lors de mon stage chez Fidelo Agency. C’est une application web qui sert à gérer les devis et factures pour ses clients. Les devis sont ajustables pour le client qui peut sélectionner ou non des options.', 'about' => 'Projet réalisé lors de mon stage chez Fidelo Agency. C’est une application web qui sert à gérer les devis et factures pour ses clients. Les devis sont ajustables pour le client qui peut sélectionner ou non des options.', 'client' => 'Le Vieux Moulin', 'client_about' => 'ASBL', 'github' => 'https://github.com/Coppens-Anthony/Le_vieux_moulin', 'link' => null, 'start_at' => 28 - 04 - 2025, 'end_at' => 13 - 06 - 2025],
            ['name' => 'curriculum vitae', 'year' => 2025, 'description' => 'Projet réalisé lors de mon stage chez Fidelo Agency. C’est une application web qui sert à gérer les devis et factures pour ses clients. Les devis sont ajustables pour le client qui peut sélectionner ou non des options.', 'about' => 'Projet réalisé lors de mon stage chez Fidelo Agency. C’est une application web qui sert à gérer les devis et factures pour ses clients. Les devis sont ajustables pour le client qui peut sélectionner ou non des options.', 'client' => 'Anthony Coppens', 'client_about' => 'CV personnel', 'github' => 'https://github.com/Coppens-Anthony/CV', 'link' => null, 'start_at' => 14 - 11 - 2024, 'end_at' => 22 - 01 - 2025],
        ];

        foreach ($projects as $project) {
            Project::create([
                'name' => $project['name'],
                'year' => $project['year'],
                'description' => $project['description'],
                'about' => $project['about'],
                'client' => $project['client'],
                'client_about' => $project['client_about'],
                'github' => $project['github'],
                'link' => $project['link'],
                'start_at' => $project['start_at'],
                'end_at' => $project['end_at'],
            ]);
        }
    }
}
