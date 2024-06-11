<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Theme;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('path_poi')->delete();
        DB::table('paths')->delete();
        DB::table('themes')->delete();

        $themes = [
            [
                'title' => 'Nature',
                'descr' => 'Découvrez la nature',
                'icon' => asset('/assets/icons/themes/nature.svg')
            ],
            [
                'title' => 'Histoire',
                'descr' => 'Découvrez l\'histoire',
                'icon' => asset('/assets/icons/themes/history.svg')
            ],
            [
                'title' => 'Sport',
                'descr' => 'Découvrez le sport',
                'icon' => asset('/assets/icons/themes/sport.svg')
            ],
            [
                'title' => 'Gastronomie',
                'descr' => 'Découvrez la gastronomie',
                'icon' => asset('/assets/icons/themes/gastronomy.svg')
            ],
            [
                'title' => 'Art',
                'descr' => 'Découvrez l\'art',
                'icon' => asset('/assets/icons/themes/art.svg')
            ],
            [
                'title' => 'Musique',
                'descr' => 'Découvrez la musique',
                'icon' => asset('/assets/icons/themes/music.svg')
            ],
            [
                'title' => 'Science',
                'descr' => 'Découvrez la science et la technologie',
                'icon' => asset('/assets/icons/themes/science.svg')
            ],
            [
                'title' => 'Architecture',
                'descr' => 'Découvrez l\'architecture',
                'icon' => asset('/assets/icons/themes/architecture.svg')
            ],
            [
                'title' => 'Transport',
                'descr' => 'Découvrez le transport',
                'icon' => asset('/assets/icons/themes/transport.svg')
            ],
            [
                'title' => 'Tradition',
                'descr' => 'Découvrez la tradition',
                'icon' => asset('/assets/icons/themes/tradition.svg')
            ],
            [
                'title' => 'Religion',
                'descr' => 'Découvrez la religion',
                'icon' => asset('/assets/icons/themes/religion.svg')
            ],
        ];

        foreach ($themes as $theme) {
            Theme::create($theme);
        }
    }
}
