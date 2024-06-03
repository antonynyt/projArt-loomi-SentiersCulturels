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
        ];

        foreach ($pathPois as $pathPoi) {
            DB::table('path_poi')->insert($pathPoi);
        }
    }
}
