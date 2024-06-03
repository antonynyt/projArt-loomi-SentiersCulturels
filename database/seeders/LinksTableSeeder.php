<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Link;
use App\Models\Poi;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('links')->delete();

        $links = [
            [
                'title' => 'Terrasses de Lavaux',
                'url' => 'https://www.lavaux-unesco.ch/',
                'poi_id' => Poi::where('title', 'Terrasses de Lavaux')->value('id')
            ],
            [
                'title' => 'Château de Chillon',
                'url' => 'https://www.chillon.ch/',
                'poi_id' => Poi::where('title', 'Château de Chillon')->value('id')
            ],
            [
                'title' => 'Montreux - Rochers-de-Naye',
                'url' => 'https://www.montreuxriviera.com/en/P76499/rochers-de-naye',
                'poi_id' => Poi::where('title', 'Montreux - Rochers-de-Naye')->value('id')
            ],
            [
                'title' => 'Musée Olympique',
                'url' => 'https://www.olympic.org/museum',
                'poi_id' => Poi::where('title', 'Musée Olympique')->value('id')
            ],
            [
                'title' => 'Chaplin\'s World',
                'url' => 'https://www.chaplinsworld.com/',
                'poi_id' => Poi::where('title', 'Chaplin\'s World')->value('id')
            ],
            [
                'title' => 'Cathédrale de Lausanne',
                'url' => 'https://www.cathedrale-lausanne.ch/',
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id')
            ],
            [
                'title' => 'Tour de Sauvabelin',
                'url' => 'https://tour-de-sauvabelin.ch/',
                'poi_id' => Poi::where('title', 'Tour de Sauvabelin')->value('id')
            ],
            [
                'title' => 'Lavaux Vinorama',
                'url' => 'https://www.lavaux-vinorama.ch/',
                'poi_id' => Poi::where('title', 'Lavaux Vinorama')->value('id')
            ],
            [
                'title' => 'Grottes de Vallorbe',
                'url' => 'https://www.grottesdevallorbe.ch/',
                'poi_id' => Poi::where('title', 'Grottes de Vallorbe')->value('id')
            ],
            [
                'title' => 'Espace Horloger',
                'url' => 'https://www.espacehorloger.ch/',
                'poi_id' => Poi::where('title', 'Espace Horloger')->value('id')
            ],
            [
                'title' => 'Musée de l’Élysée',
                'url' => 'https://www.elysee.ch/',
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id')
            ],
            [
                'title' => 'Alimentarium',
                'url' => 'https://www.alimentarium.org/',
                'poi_id' => Poi::where('title', 'Alimentarium')->value('id')
            ],
            [
                'title' => 'Maison d’Ailleurs',
                'url' => 'https://www.ailleurs.ch/',
                'poi_id' => Poi::where('title', 'Maison d’Ailleurs')->value('id')
            ],
            [
                'title' => 'Musée Jenisch',
                'url' => 'https://www.museejenisch.ch/',
                'poi_id' => Poi::where('title', 'Musée Jenisch')->value('id')
            ],
            [
                'title' => 'Fondation de l’Hermitage',
                'url' => 'https://www.fondation-hermitage.ch/',
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id')
            ],
            [
                'title' => 'Signal de Bougy',
                'url' => 'https://signaldebougy.ch/',
                'poi_id' => Poi::where('title', 'Signal de Bougy')->value('id')
            ],
            [
                'title' => 'Musée de Pully',
                'url' => 'https://www.museedepully.ch/',
                'poi_id' => Poi::where('title', 'Musée de Pully')->value('id')
            ],
            [
                'title' => 'Château de Grandson',
                'url' => 'https://www.chateau-grandson.ch/',
                'poi_id' => Poi::where('title', 'Château de Grandson')->value('id')
            ],
            [
                'title' => 'Musée de la Confrérie des Vignerons',
                'url' => 'https://www.confreriedesvignerons.ch/informations/le-musee/',
                'poi_id' => Poi::where('title', 'Musée de la Confrérie des Vignerons')->value('id')
            ],
            [
                'title' => 'Château d\'Aigle',
                'url' => 'https://www.chateauaigle.ch/',
                'poi_id' => Poi::where('title', 'Château d\'Aigle')->value('id')
            ],
            [
                'title' => 'Musée Bolo',
                'url' => 'https://museebolo.epfl.ch/',
                'poi_id' => Poi::where('title', 'Musée Bolo')->value('id')
            ],
            [
                'title' => 'Parc Naturel Jura Vaudois',
                'url' => 'https://www.parcjuravaudois.ch/',
                'poi_id' => Poi::where('title', 'Parc Naturel Jura Vaudois')->value('id')
            ],
            [
                'title' => 'Aquatis Aquarium-Vivarium',
                'url' => 'https://www.aquatis.ch/',
                'poi_id' => Poi::where('title', 'Aquatis Aquarium-Vivarium')->value('id')
            ],
            [
                'title' => 'Musée romain de Lausanne-Vidy',
                'url' => 'https://www.lausanne.ch/vie-pratique/culture/musees/mrv.html',
                'poi_id' => Poi::where('title', 'Musée romain de Lausanne-Vidy')->value('id')
            ],
            [
                'title' => 'Maison du Blé et du Pain',
                'url' => 'https://www.maison-ble-pain.ch/',
                'poi_id' => Poi::where('title', 'Maison du Blé et du Pain')->value('id')
            ],
            [
                'title' => 'Musée du Vieux Montreux',
                'url' => 'https://www.museemontreux.ch/',
                'poi_id' => Poi::where('title', 'Musée du Vieux Montreux')->value('id')
            ],
            [
                'title' => 'Musée Suisse du Jeu',
                'url' => 'https://www.museedujeu.ch/',
                'poi_id' => Poi::where('title', 'Musée Suisse du Jeu')->value('id')
            ],
            [
                'title' => 'Château de Morges',
                'url' => 'https://chateau-morges.ch/le-chateau/',
                'poi_id' => Poi::where('title', 'Château de Morges')->value('id')
            ],
            [
                'title' => 'Le Jardin Botanique de Lausanne',
                'url' => 'https://botanique.vd.ch/jardin-de-lausanne/jardin-botanique-de-lausanne/',
                'poi_id' => Poi::where('title', 'Le Jardin Botanique de Lausanne')->value('id')
            ],
            [
                'title' => 'Musée Historique de Lausanne',
                'url' => 'https://www.lausanne.ch/vie-pratique/culture/musees/mhl.html',
                'poi_id' => Poi::where('title', 'Musée Historique de Lausanne')->value('id')
            ],
            [
                'title' => 'Parc de Mon Repos',
                'url' => 'https://www.lausanne.ch/vie-pratique/nature/parc-promenades/parcs-historiques/parc-mon-repos.html',
                'poi_id' => Poi::where('title', 'Parc de Mon Repos')->value('id')
            ],
            [
                'title' => 'Église Saint-François',
                'url' => 'https://www.sainf.ch/',
                'poi_id' => Poi::where('title', 'Église Saint-François')->value('id')
            ],
            [
                'title' => 'Musée de la Main UNIL-CHUV',
                'url' => 'https://www.museedelamain.ch/',
                'poi_id' => Poi::where('title', 'Musée de la Main UNIL-CHUV')->value('id')
            ],
            [
                'title' => 'Place de la Palud',
                'url' => 'https://www.lausanne-tourisme.ch/fr/decouvrir/place-de-la-palud/',
                'poi_id' => Poi::where('title', 'Place de la Palud')->value('id')
            ],
            [
                'title' => 'Musée Alexis Forel',
                'url' => 'https://museeforel.ch/',
                'poi_id' => Poi::where('title', 'Musée Alexis Forel')->value('id')
            ],
            [
                'title' => 'La Maison de la Rivière',
                'url' => 'https://www.maisondelariviere.ch/',
                'poi_id' => Poi::where('title', 'La Maison de la Rivière')->value('id')
            ],
            [
                'title' => 'Les Pléiades',
                'url' => 'https://www.lespleiades.ch/',
                'poi_id' => Poi::where('title', 'Les Pléiades')->value('id')
            ],
            [
                'title' => 'Château de La Sarraz',
                'url' => 'https://www.chateau-lasarraz.ch/',
                'poi_id' => Poi::where('title', 'Château de La Sarraz')->value('id')
            ],
        ];

        foreach ($links as $link) {
            Link::create($link);
        }
    }
}
