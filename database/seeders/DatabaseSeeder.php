<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AchievementsTableSeeder::class);
        $this->call(AchievementUserTableSeeder::class);
        $this->call(PoisTableSeeder::class);
        $this->call(PoiFactsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(LinksTableSeeder::class);
        $this->call(AudioTableSeeder::class);
        $this->call(QuizzesTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(PoiHistoriesTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(PathsTableSeeder::class);
        $this->call(PathPoiTableSeeder::class);
        $this->call(PathHistoriesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
    }
}
