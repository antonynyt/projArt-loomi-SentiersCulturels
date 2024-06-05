<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Path;
use App\Models\Poi;

class PathPoiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('path_poi')->delete();

        $pathPois = [
            //Découverte de Lausanne
            [
                'path_id' => Path::where('title', 'Découverte de Lausanne')->value('id'),
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id'),
                'position' => 1,
            ],
            [
                'path_id' => Path::where('title', 'Découverte de Lausanne')->value('id'),
                'poi_id' => Poi::where('title', 'Place de la Palud')->value('id'),
                'position' => 2,
            ],
            [
                'path_id' => Path::where('title', 'Découverte de Lausanne')->value('id'),
                'poi_id' => Poi::where('title', 'Musée Historique de Lausanne')->value('id'),
                'position' => 3,
            ],
            //Art et Nature à Lausanne
            [
                'path_id' => Path::where('title', 'Art et Nature à Lausanne')->value('id'),
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id'),
                'position' => 1,
            ],
            [
                'path_id' => Path::where('title', 'Art et Nature à Lausanne')->value('id'),
                'poi_id' => Poi::where('title', 'Parc de Mon Repos')->value('id'),
                'position' => 2,
            ],
            [
                'path_id' => Path::where('title', 'Art et Nature à Lausanne')->value('id'),
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id'),
                'position' => 3,
            ],
            //Science et Technologie à Lausanne
            [
                'path_id' => Path::where('title', 'Science et Technologie à Lausanne')->value('id'),
                'poi_id' => Poi::where('title', 'Musée Bolo')->value('id'),
                'position' => 1,
            ],
            [
                'path_id' => Path::where('title', 'Science et Technologie à Lausanne')->value('id'),
                'poi_id' => Poi::where('title', 'Espace des Inventions')->value('id'),
                'position' => 2,
            ],
            [
                'path_id' => Path::where('title', 'Science et Technologie à Lausanne')->value('id'),
                'poi_id' => Poi::where('title', 'Musée de la Main UNIL-CHUV')->value('id'),
                'position' => 3,
            ],
            //Lausanne historique et culturel
            [
                'path_id' => Path::where('title', 'Lausanne historique et culturel')->value('id'),
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id'),
                'position' => 1,
            ],
            [
                'path_id' => Path::where('title', 'Lausanne historique et culturel')->value('id'),
                'poi_id' => Poi::where('title', 'Château Saint-Maire')->value('id'),
                'position' => 2,
            ],
            [
                'path_id' => Path::where('title', 'Lausanne historique et culturel')->value('id'),
                'poi_id' => Poi::where('title', 'Musée historique de Lausanne')->value('id'),
                'position' => 3,
            ],
            [
                'path_id' => Path::where('title', 'Lausanne historique et culturel')->value('id'),
                'poi_id' => Poi::where('title', 'Palais de Rumine')->value('id'),
                'position' => 4,
            ],
            [
                'path_id' => Path::where('title', 'Lausanne historique et culturel')->value('id'),
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id'),
                'position' => 5,
            ],
            //Lavaux vignobles et dégustation
            [
                'path_id' => Path::where('title', 'Lavaux vignobles et dégustation')->value('id'),
                'poi_id' => Poi::where('title', 'Lavaux Vinorama')->value('id'),
                'position' => 2,
            ],
            [
                'path_id' => Path::where('title', 'Lavaux vignobles et dégustation')->value('id'),
                'poi_id' => Poi::where('title', 'Vignoble en terrasses (chemin de randonnée)')->value('id'),
                'position' => 3,
            ],
            [
                'path_id' => Path::where('title', 'Lavaux vignobles et dégustation')->value('id'),
                'poi_id' => Poi::where('title', 'Domaine Croix Duplex')->value('id'),
                'position' => 1,
            ],
            [
                'path_id' => Path::where('title', 'Lavaux vignobles et dégustation')->value('id'),
                'poi_id' => Poi::where('title', 'Caveau de Dézaley')->value('id'),
                'position' => 4,
            ],
            //Montreux et ses environs
            [
                'path_id' => Path::where('title', 'Montreux et ses environs')->value('id'),
                'poi_id' => Poi::where('title', 'Château de Chillon')->value('id'),
                'position' => 1,
            ],
            [
                'path_id' => Path::where('title', 'Montreux et ses environs')->value('id'),
                'poi_id' => Poi::where('title', 'Lakeside Promenade')->value('id'),
                'position' => 2,
            ],
            [
                'path_id' => Path::where('title', 'Montreux et ses environs')->value('id'),
                'poi_id' => Poi::where('title', 'Statue de Freddie Mercury')->value('id'),
                'position' => 3,
            ],
            [
                'path_id' => Path::where('title', 'Montreux et ses environs')->value('id'),
                'poi_id' => Poi::where('title', 'Musée du Vieux Montreux')->value('id'),
                'position' => 4,
            ],
            [
                'path_id' => Path::where('title', 'Montreux et ses environs')->value('id'),
                'poi_id' => Poi::where('title', 'Casino de Montreux')->value('id'),
                'position' => 5,
            ],
            //Vevey et la gastronomie
            [
                'path_id' => Path::where('title', 'Vevey et la gastronomie')->value('id'),
                'poi_id' => Poi::where('title', 'Alimentarium')->value('id'),
                'position' => 1,
            ],
            [
                'path_id' => Path::where('title', 'Vevey et la gastronomie')->value('id'),
                'poi_id' => Poi::where('title', 'Musée Jenisch')->value('id'),
                'position' => 2,
            ],
            [
                'path_id' => Path::where('title', 'Vevey et la gastronomie')->value('id'),
                'poi_id' => Poi::where('title', 'Läderach - Chocolatier Suisse')->value('id'),
                'position' => 3,
            ],
            [
                'path_id' => Path::where('title', 'Vevey et la gastronomie')->value('id'),
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id'),
                'position' => 4,
            ],
            [
                'path_id' => Path::where('title', 'Vevey et la gastronomie')->value('id'),
                'poi_id' => Poi::where('title', 'Musée suisse du jeu')->value('id'),
                'position' => 5,
            ],
        ];

        foreach ($pathPois as $pathPoi) {
            DB::table('path_poi')->insert($pathPoi);
        }
    }
}
