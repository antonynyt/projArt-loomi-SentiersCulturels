<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievement;
use Illuminate\Support\Facades\DB;

class AchievementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('achievement_user')->delete();
        DB::table('achievements')->delete();

        $achievements = [
            [
                'id' => 6,
                'title' => 'Légendaire',
                'descr' => 'Vous êtes une véritable légende avec 50 sentiers complétés ! Votre dévouement est hors du commun !',
                'criteria' => 'Terminer 50 sentiers',
                'image' => asset('storage/images/achievements/legende.svg'),
                'next_achievement' => null,
            ],
            [
                'id' => 5,
                'title' => 'Expert',
                'descr' => 'Félicitations pour avoir atteint 35 sentiers ! Votre expertise est incontestable !',
                'criteria' => 'Terminer 35 sentiers',
                'image' => asset('storage/images/achievements/expert.svg'),
                'next_achievement' => 6,
            ],
            [
                'id' => 4,
                'title' => 'Aventurier',
                'descr' => 'Vous êtes un vrai aventurier avec 20 sentiers à votre actif ! Continuez à explorer !',
                'criteria' => 'Terminer 20 sentiers',
                'image' => asset('storage/images/achievements/aventurier.svg'),
                'next_achievement' => 5,
            ],
            [
                'id' => 3,
                'title' => 'Expérimenté',
                'descr' => 'Impressionnant ! Vous avez terminé 10 sentiers et acquis une solide expérience !',
                'criteria' => 'Terminer 10 sentiers',
                'image' => asset('storage/images/achievements/explorateur.svg'),
                'next_achievement' => 4,
            ],
            [
                'id' => 2,
                'title' => 'Assidu',
                'descr' => 'Bravo pour avoir complété 5 sentiers ! Vous êtes sur la bonne voie !',
                'criteria' => 'Terminer 5 sentiers',
                'image' => asset('storage/images/achievements/randonneur.svg'),
                'next_achievement' => 3,
            ],
            [
                'id' => 1,
                'title' => 'Débutant',
                'descr' => 'Félicitations pour avoir terminé votre premier sentier !',
                'criteria' => 'Terminer 1 sentier',
                'image' => asset('storage/images/achievements/debutant.svg'),
                'next_achievement' => 2,
            ],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }
    }
}
