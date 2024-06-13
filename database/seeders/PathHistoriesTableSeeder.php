<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Path;
use App\Models\User;

class PathHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('path_histories')->delete();

        $pathHistories = [
            [


                'path_id' => Path::where('title', 'Vevey et la gastronomie')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [


                'path_id' => Path::where('title', 'Montreux et ses environs')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [


                'path_id' => Path::where('title', 'Lavaux vignobles et dégustation')->value('id'),
                'user_id' => User::where('pseudo', 'ariadnemelissargos')->value('id'),
            ],
            [


                'path_id' => Path::where('title', 'Lausanne historique et culturel')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [


                'path_id' => Path::where('title', 'Science et Technologie à Lausanne')->value('id'),
                'user_id' => User::where('pseudo', 'francoiscuennet')->value('id'),
            ],
            [


                'path_id' => Path::where('title', 'Art et Nature à Lausanne')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [


                'path_id' => Path::where('title', 'Lausanne historique et culturel')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
        ];

        DB::table('path_histories')->insert($pathHistories);
    }
}
