<?php

namespace Database\Seeders;

use App\Enums\CategoriesEnum;
use App\Enums\ExperiencesEnum;
use App\Jobs\ProcessUploadedPhoto;
use App\Models\Competence;
use App\Models\Experience;
use App\Models\Photo;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
            'email' => 'john@doe.com',
            'password' => bcrypt('password'),
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
            ['name' => 'Wordpress', 'category' => CategoriesEnum::TOOL],
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
            [
                'name' => 'Joana-Coiffure',
                'year' => 2026,
                'description' => 'Projet de fin d’études pour un salon de coiffure fictif. Système de prise de rendez-vous intégré ainsi qu’une gestion interne pour les membres du salon.',
                'about' => 'Ce projet était très complet. Je suis passé par la recherche d\'idée, de la veille, la conception de l\'interface via un moodboard, un wireframe ainsi que le design final. J\'ai ensuite intégré tout le contenu et travaillé sur les fonctionnalités de l\'application.

                           L\'application permettait de présenter le salon de coiffure (fictif dans mon cas) et donnait l\'occasion aux utilisateurs de prendre rendez-vous par eux-mêmes sans dépendre de quelqu\'un ou d\'un service externe.

                           Au niveau de la gestion interne, il y avait un compte administrateur qui pouvait gérer tout ce qui se retrouvait dans la partie client ainsi qu\'une partie pour les coiffeurs eux-mêmes qui leur permettait de gérer leurs rendez-vous et clients.',
                'client' => 'Joana-Coiffure',
                'client_about' => 'Salon de coiffure fictif',
                'github' => 'https://github.com/Coppens-Anthony/Joana-coiffure',
                'link' => null,
                'start_at' => '10-04-2026',
                'end_at' => '30-07-2026'
            ],

            [
                'name' => 'Fidelo Sales',
                'year' => 2026,
                'description' => 'Projet réalisé lors de mon stage chez Fidelo Agency. C’est une application web qui sert à gérer les devis et factures pour ses clients. Les devis sont ajustables pour le client qui peut sélectionner ou non des options.',
                'about' => 'L\'équipe de Fidelo avait besoin d\'un nouvel outil leur permettant de gérer leurs devis et factures puisque celui qu\'elle utilisait avait un soucis. Elle ne permettait pas au client de choisir par lui-même des options. Le solde du devis n\'était alors pas toujours le bon en fonction du choix des clients. J\'ai alors eu comme mission de remédier à ce problème.

                            J\'ai fait en sorte d\'ajouter des options aux devis que le client pouvait choisir ou non lors de sa consultation. Le solde total se mettait à jour en direct afin qu\'il ait une vision correcte de son devis. Il pouvait alors accepter ou refuser le devis en fonction du solde.

                            Durant les semaines de mon stage, j\'ai pu rendre cet outil assez complet pour tout ce qui touchait à la comptabilité. Ce nouvel outil permet donc de créer des devis ainsi que des factures, permet de renseigner les dépenses de l\'agence et avoir un rapport de bénéfice/déficit, un suivi de paiement ainsi qu\'une gestion des clients.',
                'client' => 'Fidelo Agency',
                'client_about' => 'Outil destiné à l\'agence',
                'github' => null,
                'link' => null,
                'start_at' => '10-02-2026',
                'end_at' => '30-04-2026'
            ],

            [
                'name' => 'Les pattes heureuses',
                'year' => 2025,
                'description' => 'Projet scolaire consistant à développer une application web pour un refuge animalier fictif. Pour cela, l\'utilisation de Laravel était évident. ',
                'about' => 'Ce projet nécessitait deux parties distinctes. La partie publique étant destinée aux clients ainsi que la partie administrative destinée aux membres du refuge.

                            Pour la première partie, il fallait faire ressortir la douceur que les animaux peuvent faire ressentir. Il fallait évidemment qu\'un client puisse faire une demande d\'adoption directement via le site client.

                            La partie administrative servait alors à gérer les demandes d\'adoptions ainsi que l\'état des animaux du refuges. Un compte administrateur était alors là afin de valider les choses importantes. Tout passait par lui.',
                'client' => 'Les pattes heureuses',
                'client_about' => 'Refuge animalier fictif',
                'github' => 'https://github.com/Coppens-Anthony/refuge-animalier',
                'link' => null,
                'start_at' => '10-11-2025',
                'end_at' => '02-01-2026'
            ],

            [
                'name' => 'Le Vieux Moulin',
                'year' => 2025,
                'description' => 'Projet scolaire consistant à créer un site pour un client. Cette année là, le client était un SRG visant à aider les enfants ne pouvant pas êtres gardés par leurs parents.',
                'about' => 'Ce projet devait être réalisé avec WordPress puisque le client allait choisir le site d\'un étudiant pour qu\'il devienne son site officiel. Il devait donc pouvoir modifier et adapter le contenu.

                            Ce projet mettait en avant le côté visuel du site puisque le client ne connaissant pas le web, jugerait uniquement sur le visuel. Il fallait alors un design qui fasse ressortir le côté un peu enfantin du SRG. C\'est pour cela que je suis parti sur des éléments avec beaucoup d\'arrondis.',
                'client' => 'Le Vieux Moulin',
                'client_about' => 'ASBL',
                'github' => 'https://github.com/Coppens-Anthony/Le_vieux_moulin',
                'link' => null,
                'start_at' => '28-04-2025',
                'end_at' => '13-06-2025'
            ],

            [
                'name' => 'Curriculum vitae',
                'year' => 2025,
                'description' => 'Projet scolaire ayant pour but de reprendre le design d\'un site existant en y intégrant nos informations personnelles afin d\'en faire un CV.',
                'about' => 'Pour ce projet, il me fallait trouver un site à choisir. J\'ai alors choisi celui de WordPress qui pour moi était totalement adapté à la demande. Il possédait plusieurs sections bien définies que je pouvais transformer en section personnelle.

                            J\'avais comme consignes de ne pas modifier quoi que ce soit à moins qu\'il y ait un problème sur le site lui-même comme par exemple un problème de contraste ou autre.

                            J\'ai donc refait toutes les sections en gardant les couleurs, les typographies, les animations ainsi que les éléments graphiques.',
                'client' => 'Anthony Coppens',
                'client_about' => 'CV personnel',
                'github' => 'https://github.com/Coppens-Anthony/CV',
                'link' => null,
                'start_at' => '14-11-2024',
                'end_at' => '22-01-2025'
            ],

        ];

        $avatars = [
            'joana-coiffure_mockup', 'fidelo_mockup', 'les-pattes-heureuses_mockup', 'le-vieux-moulin_mockup', 'cv_mockup'
        ];

        $processedAvatars = [];

        foreach ($avatars as $avatar) {

            $newName = uniqid() . '.' . config('photos.picture_type');

            $sourcePath = public_path("assets/img/mockups/$avatar.png");

            $relativePath = config('photos.original_path') . '/' . $newName;
            $disk = config('filesystems.default');

            Storage::disk($disk)->put(
                $relativePath,
                file_get_contents($sourcePath)
            );

            ProcessUploadedPhoto::dispatchSync($relativePath, $newName);

            $processedAvatars[] = $newName;
        }

        foreach ($projects as $index => $project) {
            Project::create([
                'name' => $project['name'],
                'avatar' => $processedAvatars[$index] ?? null,
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

        $projectCompetences = [
            1 => [1, 3, 5, 8, 9, 10, 11, 12, 14, 15, 19, 21, 22, 24],
            2 => [1, 2, 3, 5, 10, 11, 13, 15, 16, 20, 21, 22],
            3 => [1, 3, 5, 8, 9, 10, 11, 12, 14, 15, 19, 21, 22, 24],
            4 => [1, 2, 3, 10, 15, 17, 19, 21, 22, 25],
            5 => [1, 2, 3, 15, 17, 18, 19, 22],
        ];

        foreach ($projectCompetences as $projectId => $competenceIds) {
            Project::find($projectId)->competences()->attach($competenceIds);
        }

        $projectIds = [
            'Joana-Coiffure' => 1,
            'Fidelo Sales' => 2,
            'Les pattes heureuses' => 3,
            'Le Vieux Moulin' => 4,
            'curriculum vitae' => 5,
        ];

        $projectFolders = [
            'Joana-Coiffure' => 'joana-coiffure',
            'Fidelo Sales' => 'fidelo',
            'Les pattes heureuses' => 'les-pattes-heureuses',
            'Le Vieux Moulin' => 'le-vieux-moulin',
            'curriculum vitae' => 'cv',
        ];

        foreach ($projectFolders as $projectName => $folder) {
            $projectId = $projectIds[$projectName];
            $folderPath = public_path("assets/img/{$folder}");

            $files = array_filter(scandir($folderPath), function ($file) use ($folderPath) {
                return is_file($folderPath . '/' . $file)
                    && preg_match('/\.(png|jpe?g|webp|gif)$/i', $file);
            });

            foreach ($files as $file) {
                $sourcePath = $folderPath . '/' . $file;

                $extension = pathinfo($file, PATHINFO_EXTENSION);
                $newName = uniqid() . '.' . (config('photos.picture_type') ?? $extension);

                $relativePath = config('photos.original_path') . '/' . $newName;
                $disk = config('filesystems.default');

                Storage::disk($disk)->put(
                    $relativePath,
                    file_get_contents($sourcePath)
                );

                ProcessUploadedPhoto::dispatchSync($relativePath, $newName);

                Photo::create([
                    'photo' => $newName,
                    'project_id' => $projectId,
                ]);
            }
        }

    }
}
