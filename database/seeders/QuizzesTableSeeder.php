<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Quiz;
use App\Models\Poi;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('quizzes')->delete();

        $quizzes = [
            [
                'title' => 'Quiz - Terrasses de Lavaux',
                'poi_id' => Poi::where('title', 'Terrasses de Lavaux')->value('id'),
            ],
            [
                'title' => 'Quiz - Château de Chillon',
                'poi_id' => Poi::where('title', 'Château de Chillon')->value('id'),
            ],
            [
                'title' => 'Quiz - Montreux - Rochers-de-Naye',
                'poi_id' => Poi::where('title', 'Montreux - Rochers-de-Naye')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée Olympique',
                'poi_id' => Poi::where('title', 'Musée Olympique')->value('id'),
            ],
            [
                'title' => 'Quiz - Chaplin\'s World',
                'poi_id' => Poi::where('title', 'Chaplin\'s World')->value('id'),
            ],
            [
                'title' => 'Quiz - Cathédrale de Lausanne',
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id'),
            ],
            [
                'title' => 'Quiz - Tour de Sauvabelin',
                'poi_id' => Poi::where('title', 'Tour de Sauvabelin')->value('id'),
            ],
            [
                'title' => 'Quiz - Lavaux Vinorama',
                'poi_id' => Poi::where('title', 'Lavaux Vinorama')->value('id'),
            ],
            [
                'title' => 'Quiz - Grottes de Vallorbe',
                'poi_id' => Poi::where('title', 'Grottes de Vallorbe')->value('id'),
            ],
            [
                'title' => 'Quiz - Espace Horloger',
                'poi_id' => Poi::where('title', 'Espace Horloger')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée de l’Élysée',
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id'),
            ],
            [
                'title' => 'Quiz - Alimentarium',
                'poi_id' => Poi::where('title', 'Alimentarium')->value('id'),
            ],
            [
                'title' => 'Quiz - Maison d’Ailleurs',
                'poi_id' => Poi::where('title', 'Maison d’Ailleurs')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée Jenisch',
                'poi_id' => Poi::where('title', 'Musée Jenisch')->value('id'),
            ],
            [
                'title' => 'Quiz - Fondation de l’Hermitage',
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id'),
            ],
            [
                'title' => 'Quiz - Signal de Bougy',
                'poi_id' => Poi::where('title', 'Signal de Bougy')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée de Pully',
                'poi_id' => Poi::where('title', 'Musée de Pully')->value('id'),
            ],
            [
                'title' => 'Quiz - Château de Grandson',
                'poi_id' => Poi::where('title', 'Château de Grandson')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée de la Confrérie des Vignerons',
                'poi_id' => Poi::where('title', 'Musée de la Confrérie des Vignerons')->value('id'),
            ],
            [
                'title' => 'Quiz - Château d\'Aigle',
                'poi_id' => Poi::where('title', 'Château d\'Aigle')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée Bolo',
                'poi_id' => Poi::where('title', 'Musée Bolo')->value('id'),
            ],
            [
                'title' => 'Quiz - Parc Naturel Jura Vaudois',
                'poi_id' => Poi::where('title', 'Parc Naturel Jura Vaudois')->value('id'),
            ],
            [
                'title' => 'Quiz - Aquatis Aquarium-Vivarium',
                'poi_id' => Poi::where('title', 'Aquatis Aquarium-Vivarium')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée romain de Lausanne-Vidy',
                'poi_id' => Poi::where('title', 'Musée romain de Lausanne-Vidy')->value('id'),
            ],
            [
                'title' => 'Quiz - Maison du Blé et du Pain',
                'poi_id' => Poi::where('title', 'Maison du Blé et du Pain')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée du Vieux Montreux',
                'poi_id' => Poi::where('title', 'Musée du Vieux Montreux')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée Suisse du Jeu',
                'poi_id' => Poi::where('title', 'Musée Suisse du Jeu')->value('id'),
            ],
            [
                'title' => 'Quiz - Château de Morges',
                'poi_id' => Poi::where('title', 'Château de Morges')->value('id'),
            ],
            [
                'title' => 'Quiz - Le Jardin Botanique de Lausanne',
                'poi_id' => Poi::where('title', 'Le Jardin Botanique de Lausanne')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée Historique de Lausanne',
                'poi_id' => Poi::where('title', 'Musée Historique de Lausanne')->value('id'),
            ],
            [
                'title' => 'Quiz - Parc de Mon Repos',
                'poi_id' => Poi::where('title', 'Parc de Mon Repos')->value('id'),
            ],
            [
                'title' => 'Quiz - Église Saint-François',
                'poi_id' => Poi::where('title', 'Église Saint-François')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée de la Main UNIL-CHUV',
                'poi_id' => Poi::where('title', 'Musée de la Main UNIL-CHUV')->value('id'),
            ],
            [
                'title' => 'Quiz - Place de la Palud',
                'poi_id' => Poi::where('title', 'Place de la Palud')->value('id'),
            ],
            [
                'title' => 'Quiz - Musée Alexis Forel',
                'poi_id' => Poi::where('title', 'Musée Alexis Forel')->value('id'),
            ],
            [
                'title' => 'Quiz - La Maison de la Rivière',
                'poi_id' => Poi::where('title', 'La Maison de la Rivière')->value('id'),
            ],
            [
                'title' => 'Quiz - Les Pléiades',
                'poi_id' => Poi::where('title', 'Les Pléiades')->value('id'),
            ],
            [
                'title' => 'Quiz - Château de La Sarraz',
                'poi_id' => Poi::where('title', 'Château de La Sarraz')->value('id'),
            ],
        ];

        foreach ($quizzes as $quiz) {
            Quiz::create($quiz);
        }
    }
}
