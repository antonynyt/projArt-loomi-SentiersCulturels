<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Link;
use App\Models\Poi;
use App\Models\Path;

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
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Terrasses de Lavaux')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Château de Chillon',
                'url' => 'https://www.chillon.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Château de Chillon')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Montreux - Rochers-de-Naye',
                'url' => 'https://www.montreuxriviera.com/en/P76499/rochers-de-naye',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Montreux - Rochers-de-Naye')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée Olympique',
                'url' => 'https://www.olympic.org/museum',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée Olympique')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Chaplin\'s World',
                'url' => 'https://www.chaplinsworld.com/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Chaplin\'s World')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Cathédrale de Lausanne',
                'url' => 'https://www.cathedrale-lausanne.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Tour de Sauvabelin',
                'url' => 'https://tour-de-sauvabelin.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Tour de Sauvabelin')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Lavaux Vinorama',
                'url' => 'https://www.lavaux-vinorama.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Lavaux Vinorama')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Grottes de Vallorbe',
                'url' => 'https://www.grottesdevallorbe.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Grottes de Vallorbe')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Espace Horloger',
                'url' => 'https://www.espacehorloger.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Espace Horloger')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée de l’Élysée',
                'url' => 'https://www.elysee.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Alimentarium',
                'url' => 'https://www.alimentarium.org/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Alimentarium')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Maison d’Ailleurs',
                'url' => 'https://www.ailleurs.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Maison d’Ailleurs')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée Jenisch',
                'url' => 'https://www.museejenisch.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée Jenisch')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Fondation de l’Hermitage',
                'url' => 'https://www.fondation-hermitage.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Signal de Bougy',
                'url' => 'https://signaldebougy.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Signal de Bougy')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée de Pully',
                'url' => 'https://www.museedepully.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée de Pully')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Château de Grandson',
                'url' => 'https://www.chateau-grandson.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Château de Grandson')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée de la Confrérie des Vignerons',
                'url' => 'https://www.confreriedesvignerons.ch/informations/le-musee/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée de la Confrérie des Vignerons')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Château d\'Aigle',
                'url' => 'https://www.chateauaigle.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Château d\'Aigle')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée Bolo',
                'url' => 'https://museebolo.epfl.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée Bolo')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Parc Naturel Jura Vaudois',
                'url' => 'https://www.parcjuravaudois.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Parc Naturel Jura Vaudois')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Aquatis Aquarium-Vivarium',
                'url' => 'https://www.aquatis.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Aquatis Aquarium-Vivarium')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée romain de Lausanne-Vidy',
                'url' => 'https://www.lausanne.ch/vie-pratique/culture/musees/mrv.html',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée romain de Lausanne-Vidy')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Maison du Blé et du Pain',
                'url' => 'https://www.maison-ble-pain.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Maison du Blé et du Pain')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée du Vieux Montreux',
                'url' => 'https://www.museemontreux.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée du Vieux Montreux')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée Suisse du Jeu',
                'url' => 'https://www.museedujeu.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée Suisse du Jeu')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Château de Morges',
                'url' => 'https://chateau-morges.ch/le-chateau/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Château de Morges')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Le Jardin Botanique de Lausanne',
                'url' => 'https://botanique.vd.ch/jardin-de-lausanne/jardin-botanique-de-lausanne/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Le Jardin Botanique de Lausanne')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée Historique de Lausanne',
                'url' => 'https://www.lausanne.ch/vie-pratique/culture/musees/mhl.html',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée Historique de Lausanne')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Parc de Mon Repos',
                'url' => 'https://www.lausanne.ch/vie-pratique/nature/parc-promenades/parcs-historiques/parc-mon-repos.html',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Parc de Mon Repos')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Église Saint-François',
                'url' => 'https://www.sainf.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Église Saint-François')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée de la Main UNIL-CHUV',
                'url' => 'https://www.museedelamain.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée de la Main UNIL-CHUV')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Place de la Palud',
                'url' => 'https://www.lausanne-tourisme.ch/fr/decouvrir/place-de-la-palud/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Place de la Palud')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Musée Alexis Forel',
                'url' => 'https://museeforel.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Musée Alexis Forel')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'La Maison de la Rivière',
                'url' => 'https://www.maisondelariviere.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'La Maison de la Rivière')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Les Pléiades',
                'url' => 'https://www.lespleiades.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Les Pléiades')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Château de La Sarraz',
                'url' => 'https://www.chateau-lasarraz.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Château de La Sarraz')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Espace des Inventions',
                'url' => 'https://www.espace-des-inventions.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Espace des Inventions')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Château Saint-Maire',
                'url' => 'https://www.vd.ch/territoire-et-construction/monuments-et-sites/monuments-cantonaux/le-chateau-saint-maire',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Château Saint-Maire')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Domaine Croix Duplex',
                'url' => 'https://www.croix-duplex.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Domaine Croix Duplex')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Caveau de Dézaley',
                'url' => 'https://www.dezaley.ch/fr/caveaux/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Caveau de Dézaley')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Casino de Montreux',
                'url' => 'https://www.casinosbarriere.com/fr/montreux.html',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Casino de Montreux')->value('id'),
                'path_id' => null
            ],
            [
                'title' => 'Lavaux, Patrimoine mondial',
                'url' => 'https://www.lavaux-unesco.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Vignoble en terrasses (chemin de randonnée)')->value('id'),
                'path_id' => null,
            ],
            [
                'title' => 'Site officiel de Läderach',
                'url' => 'https://laderach.com/ch-fr/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Läderach - Chocolatier Suisse')->value('id'),
                'path_id' => null,
            ],
            [
                'title' => 'Site officiel du Palais de Rumine',
                'url' => 'https://www.palaisderumine.ch/',
                'type' => 'official',
                'poi_id' => Poi::where('title', 'Palais de Rumine')->value('id'),
                'path_id' => null,
            ],
            [
                'title' => 'Parking de Mon-Repos',
                'url' => 'https://ch.parkindigo.com/parkings/parking-mon-repos/',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Découverte de Lausanne')->value('id'),
                'poi_id' => null
            ],
            [
                'title' => 'Parking de la Riponne',
                'url' => 'https://inovil.ch/parking/riponne/',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Découverte de Lausanne')->value('id'),
                'poi_id' => null
            ],
            [
                'title' => 'Parking de Bellefontaine',
                'url' => 'https://www.pms-parkings.ch/bellefontaine-lausanne/',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Art et Nature à Lausanne')->value('id'),
                'poi_id' => null
            ],
            [
                'title' => 'Parking du Centre',
                'url' => 'https://ch.parkindigo.com/parkings/parking-du-centre-lausanne/',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Art et Nature à Lausanne')->value('id'),
                'poi_id' => null
            ],
            [
                'title' => 'Parking de Montbenon',
                'url' => 'https://www.apcoa.ch/fr/se-garer-a/lausanne/lausanne-montbenon-lausanne-apcoa/',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Science et Technologie à Lausanne')->value('id'),
                'poi_id' => null
            ],
            [
                'title' => 'Parking de Beaulieu',
                'url' => 'https://www.lausanne.ch/vie-pratique/mobilite/parkings-stationnement/parkings-couverts/parking-de-beaulieu.html',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Science et Technologie à Lausanne')->value('id'),
                'poi_id' => null
            ],
            [
                'title' => 'Parking de Mon-Repos',
                'url' => 'https://ch.parkindigo.com/parkings/parking-mon-repos/',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Lausanne historique et culturel')->value('id'),
                'poi_id' => null
            ],
            [
                'title' => 'Parking de Chauderon',
                'url' => 'https://www.pms-parkings.ch/parking-de-chauderon-lausanne/',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Lausanne historique et culturel')->value('id'),
                'poi_id' => null
            ],
            [
                'title' => 'Parking du Centre de Grandvaux',
                'url' => 'https://www.parkopedia.fr/parking/parc_de_stationnement/pr_grandvaux/1091/bourg_en_lavaux/?arriving=202406102100&leaving=202406102300',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Lavaux vignobles et dégustation')->value('id'),
                'poi_id' => null
            ],
            [
                'title' => 'Parking des Trois Chêne',
                'url' => 'https://www.geneve-parking.ch/fr/ou-stationner/h-trois-chene-public',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Montreux et ses environs')->value('id'),
                'poi_id' => null
            ],
            [
                'title' => 'Parking Vielle Ville (ex-panorama)',
                'url' => 'https://www.acv-vevey.ch/membre/parking-panorama/',
                'type' => 'parking',
                'path_id' => Path::where('title', 'Vevey et la gastronomie')->value('id'),
                'poi_id' => null
            ]
        ];

        foreach ($links as $link) {
            Link::create($link);
        }
    }
}
