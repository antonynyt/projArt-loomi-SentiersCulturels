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
            ['title' => 'First Blood', 'icon' => 'first_blood.png'],
            ['title' => 'Double Kill', 'icon' => 'double_kill.png'],
            ['title' => 'Triple Kill', 'icon' => 'triple_kill.png'],
            ['title' => 'Quadra Kill', 'icon' => 'quadra_kill.png'],
            ['title' => 'Penta Kill', 'icon' => 'penta_kill.png'],
        ];

        foreach ($achievements as $achievement) {
            Achievement::create($achievement);
        }
    }
}
