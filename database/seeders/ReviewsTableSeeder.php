<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Path;
use App\Models\User;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->delete();

        $reviews = [
            [
                'content' => 'Une excellente expérience gastronomique ! Les restaurants et les chocolateries étaient délicieux, et la vue sur le lac est magnifique.',
                'rating' => 5,
                'path_id' => Path::where('title', 'Vevey et la gastronomie')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'content' => 'Le sentier était agréable, mais j\'ai été un peu déçu par le musée de la poupée. Je m\'attendais à quelque chose de plus impressionnant.',
                'rating' => 3,
                'path_id' => Path::where('title', 'Montreux et ses environs')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'content' => 'J\'ai beaucoup aimé la visite de la cathédrale et du musée historique. Le parcours était bien équilibré entre les sites historiques et les lieux culturels.',
                'rating' => 4,
                'path_id' => Path::where('title', 'Lausanne historique et culturel')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [
                'content' => 'Le musée de l\'Élysée et le Rolex Learning Center étaient vraiment intéressants. J\'ai appris beaucoup de choses sur la photographie et la technologie.',
                'rating' => 5,
                'path_id' => Path::where('title', 'Science et Technologie à Lausanne')->value('id'),
                'user_id' => User::where('pseudo', 'francoiscuennet')->value('id'),
            ],
            [
                'content' => 'J\'ai adoré la visite de la Fondation de l\'Hermitage et la promenade le long du quai. C\'était un bon mélange d\'art et de nature.',
                'rating' => 4,
                'path_id' => Path::where('title', 'Art et Nature à Lausanne')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
        ];

        DB::table('reviews')->insert($reviews);
    }
}
