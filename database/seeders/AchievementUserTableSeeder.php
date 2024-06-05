<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AchievementUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('achievement_user')->delete();

        $achievement_user = [
            [
                'achievement_id' => 1, // Débutant
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'achievement_id' => 1, // Débutant
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'achievement_id' => 1, // Débutant
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [
                'achievement_id' => 1, // Débutant
                'user_id' => User::where('pseudo', 'francoiscuennet')->value('id'),
            ],
            [
                'achievement_id' => 1, // Débutant
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
        ];

        DB::table('achievement_user')->insert($achievement_user);
    }


}
