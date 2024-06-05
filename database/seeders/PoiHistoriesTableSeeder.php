<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Poi;
use App\Models\User;

class PoiHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('poi_histories')->delete();

        $poiHistories = [
            // Vevey et la gastronomie
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Alimentarium')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée Jenisch')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Läderach - Chocolatier Suisse')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée suisse du jeu')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            // Montreux et ses environs
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Château de Chillon')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Lakeside Promenade')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Statue de Freddie Mercury')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée du Vieux Montreux')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Casino de Montreux')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            // Lavaux vignobles et dégustation
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Domaine Croix Duplex')->value('id'),
                'user_id' => User::where('pseudo', 'ariadnemelissargos')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Lavaux Vinorama')->value('id'),
                'user_id' => User::where('pseudo', 'ariadnemelissargos')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Vignoble en terrasses (chemin de randonnée)')->value('id'),
                'user_id' => User::where('pseudo', 'ariadnemelissargos')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Caveau de Dézaley')->value('id'),
                'user_id' => User::where('pseudo', 'ariadnemelissargos')->value('id'),
            ],
            // Lausanne historique et culturel
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Château Saint-Maire')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée historique de Lausanne')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Palais de Rumine')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            // Science et Technologie à Lausanne
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée Bolo')->value('id'),
                'user_id' => User::where('pseudo', 'francoiscuennet')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Espace des Inventions')->value('id'),
                'user_id' => User::where('pseudo', 'francoiscuennet')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée de la Main UNIL-CHUV')->value('id'),
                'user_id' => User::where('pseudo', 'francoiscuennet')->value('id'),
            ],
            // Art et Nature à Lausanne
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Parc de Mon Repos')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            // Découverte de Lausanne
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Place de la Palud')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée Historique de Lausanne')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            //Points visités individuellement
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Terrasses de Lavaux')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Montreux - Rochers-de-Naye')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée Olympique')->value('id'),
                'user_id' => User::where('pseudo', 'ariadnemelissargos')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Chaplin\'s World')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Tour de Sauvabelin')->value('id'),
                'user_id' => User::where('pseudo', 'francoiscuennet')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Grottes de Vallorbe')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Espace Horloger')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Maison d’Ailleurs')->value('id'),
                'user_id' => User::where('pseudo', 'ariadnemelissargos')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Signal de Bougy')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée de Pully')->value('id'),
                'user_id' => User::where('pseudo', 'francoiscuennet')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Château de Grandson')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Château d\'Aigle')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Parc Naturel Jura Vaudois')->value('id'),
                'user_id' => User::where('pseudo', 'ariadnemelissargos')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Aquatis Aquarium-Vivarium')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée romain de Lausanne-Vidy')->value('id'),
                'user_id' => User::where('pseudo', 'francoiscuennet')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Maison du Blé et du Pain')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Le Jardin Botanique de Lausanne')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Église Saint-François')->value('id'),
                'user_id' => User::where('pseudo', 'ariadnemelissargos')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Musée Alexis Forel')->value('id'),
                'user_id' => User::where('pseudo', 'antonyneyret')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'La Maison de la Rivière')->value('id'),
                'user_id' => User::where('pseudo', 'francoiscuennet')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Les Pléiades')->value('id'),
                'user_id' => User::where('pseudo', 'jeremymartin')->value('id'),
            ],
            [
                'is_visited' => true,
                'poi_id' => Poi::where('title', 'Château de La Sarraz')->value('id'),
                'user_id' => User::where('pseudo', 'leilafidalgo')->value('id'),
            ],
        ];

        DB::table('poi_histories')->insert($poiHistories);
    }
}
