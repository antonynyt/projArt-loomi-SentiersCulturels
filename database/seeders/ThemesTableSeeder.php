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
                'icon' => asset('storage/images/themes/nature.svg')
            ],
            [
                'title' => 'Histoire',
                'descr' => 'Découvrez l\'histoire',
                'icon' => asset('storage/images/themes/history.svg')
            ],
            [
                'title' => 'Sport',
                'descr' => 'Découvrez le sport',
                'icon' => asset('storage/images/themes/sport.svg')
            ],
            [
                'title' => 'Gastronomie',
                'descr' => 'Découvrez la gastronomie',
                'icon' => asset('storage/images/themes/gastronomy.svg')
            ],
            [
                'title' => 'Art',
                'descr' => 'Découvrez l\'art',
                'icon' => asset('storage/images/themes/art.svg')
            ],
            [
                'title' => 'Musique',
                'descr' => 'Découvrez la musique',
                'icon' => asset('storage/images/themes/music.svg')
            ],
            [
                'title' => 'Science',
                'descr' => 'Découvrez la science et la technologie',
                'icon' => asset('storage/images/themes/science.svg')
            ],
            [
                'title' => 'Architecture',
                'descr' => 'Découvrez l\'architecture',
                'icon' => asset('storage/images/themes/architecture.svg')
            ],
            [
                'title' => 'Transport',
                'descr' => 'Découvrez le transport',
                'icon' => asset('storage/images/themes/transport.svg')
            ],
            [
                'title' => 'Tradition',
                'descr' => 'Découvrez la tradition',
                'icon' => asset('storage/images/themes/tradition.svg')
            ],
            [
                'title' => 'Religion',
                'descr' => 'Découvrez la religion',
                'icon' => asset('storage/images/themes/religion.svg')
            ],
        ];

        foreach ($themes as $theme) {
            Theme::create($theme);
        }
    }
}
