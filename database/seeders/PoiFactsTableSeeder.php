<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\PoiFact;
use App\Models\Poi;

class PoiFactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('poi_facts')->delete();

        $poiFacts = [
            [
                'title' => 'Patrimoine mondial',
                'content' => 'Les terrasses de Lavaux datent du 11ème siècle et sont classées au patrimoine mondial de l\'UNESCO depuis 2007.',
                'poi_id' => Poi::where('title', 'Terrasses de Lavaux')->value('id'),
            ],
            [
                'title' => 'Vignobles de Lavaux',
                'content' => 'Les vignobles de Lavaux couvrent environ 800 hectares et produisent principalement du vin blanc, notamment du Chasselas.',
                'poi_id' => Poi::where('title', 'Terrasses de Lavaux')->value('id'),
            ],
            [
                'title' => 'Château imprenable',
                'content' => 'Le Château de Chillon est construit sur une île rocheuse du lac Léman, ce qui le rendait pratiquement imprenable au Moyen Âge.',
                'poi_id' => Poi::where('title', 'Château de Chillon')->value('id'),
            ],
            [
                'title' => 'Inspiration artistique',
                'content' => 'Le Château de Chillon a inspiré de nombreux écrivains et artistes, dont Lord Byron qui y a écrit "Le Prisonnier de Chillon".',
                'poi_id' => Poi::where('title', 'Château de Chillon')->value('id'),
            ],
            [
                'title' => 'Chemin de fer historique',
                'content' => 'La ligne de chemin de fer Montreux - Rochers-de-Naye a été inaugurée en 1892 et offre des vues spectaculaires sur les Alpes et le lac Léman.',
                'poi_id' => Poi::where('title', 'Montreux - Rochers-de-Naye')->value('id'),
            ],
            [
                'title' => 'Réserve naturelle',
                'content' => 'Les Rochers-de-Naye abritent une réserve naturelle où l\'on peut observer des marmottes et diverses espèces alpines.',
                'poi_id' => Poi::where('title', 'Montreux - Rochers-de-Naye')->value('id'),
            ],
            [
                'title' => 'Inauguration du musée',
                'content' => 'Le Musée Olympique a été inauguré en 1993 par le président du CIO, Juan Antonio Samaranch.',
                'poi_id' => Poi::where('title', 'Musée Olympique')->value('id'),
            ],
            [
                'title' => 'Collection olympique',
                'content' => 'Le musée présente plus de 10 000 objets liés à l\'histoire des Jeux Olympiques, de l\'Antiquité à nos jours.',
                'poi_id' => Poi::where('title', 'Musée Olympique')->value('id'),
            ],
            [
                'title' => 'Résidence de Chaplin',
                'content' => 'Chaplin\'s World est situé dans le Manoir de Ban, la résidence de Charlie Chaplin et de sa famille pendant les 25 dernières années de sa vie.',
                'poi_id' => Poi::where('title', 'Chaplin\'s World')->value('id'),
            ],
            [
                'title' => 'Immersion dans l\'univers de Chaplin',
                'content' => 'Le musée offre une immersion complète dans l\'univers de Charlie Chaplin, avec des expositions interactives et des scènes de ses films.',
                'poi_id' => Poi::where('title', 'Chaplin\'s World')->value('id'),
            ],
            [
                'title' => 'Architecture gothique',
                'content' => 'La cathédrale de Lausanne est considérée comme l\'un des plus beaux exemples d\'architecture gothique en Suisse.',
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id'),
            ],
            [
                'title' => 'Orgue monumental',
                'content' => 'La cathédrale abrite un orgue monumental construit par le célèbre facteur d\'orgues Cavaillé-Coll.',
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id'),
            ],
            [
                'title' => 'Tour en bois',
                'content' => 'La Tour de Sauvabelin, construite en 2003, est entièrement en bois de chêne suisse.',
                'poi_id' => Poi::where('title', 'Tour de Sauvabelin')->value('id'),
            ],
            [
                'title' => 'Vue panoramique',
                'content' => 'Du sommet de la tour, on peut voir le lac Léman, les Alpes et la ville de Lausanne.',
                'poi_id' => Poi::where('title', 'Tour de Sauvabelin')->value('id'),
            ],
            [
                'title' => 'Dégustation de vins',
                'content' => 'Le Lavaux Vinorama offre plus de 300 vins différents à déguster, tous provenant de la région de Lavaux.',
                'poi_id' => Poi::where('title', 'Lavaux Vinorama')->value('id'),
            ],
            [
                'title' => 'Visites guidées',
                'content' => 'Le Vinorama propose des visites guidées et des films documentaires sur la viticulture locale.',
                'poi_id' => Poi::where('title', 'Lavaux Vinorama')->value('id'),
            ],
            [
                'title' => 'Formation géologique',
                'content' => 'Les Grottes de Vallorbe abritent des stalactites et des stalagmites formées il y a plus de 100 millions d\'années.',
                'poi_id' => Poi::where('title', 'Grottes de Vallorbe')->value('id'),
            ],
            [
                'title' => 'Ouverture au public',
                'content' => 'Les grottes ont été ouvertes au public en 1974 et attirent des milliers de visiteurs chaque année.',
                'poi_id' => Poi::where('title', 'Grottes de Vallorbe')->value('id'),
            ],
            [
                'title' => 'Montres rares',
                'content' => 'L\'Espace Horloger expose des montres rares et des pièces d\'horlogerie uniques de la Vallée de Joux, berceau de l\'horlogerie suisse.',
                'poi_id' => Poi::where('title', 'Espace Horloger')->value('id'),
            ],
            [
                'title' => 'Ateliers horlogers',
                'content' => 'Le musée propose également des ateliers pour découvrir les secrets de la fabrication des montres.',
                'poi_id' => Poi::where('title', 'Espace Horloger')->value('id'),
            ],
            [
                'title' => 'Collection photographique',
                'content' => 'Le Musée de l’Élysée possède une collection de plus de 100 000 photographies, couvrant l\'histoire de la photographie du 19ème siècle à nos jours.',
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id'),
            ],
            [
                'title' => 'Expositions temporaires',
                'content' => 'Le musée organise régulièrement des expositions temporaires de photographes renommés et émergents.',
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id'),
            ],
            [
                'title' => 'Fondation Nestlé',
                'content' => 'L\'Alimentarium a été fondé en 1985 par la société Nestlé, située dans le bâtiment historique de l\'ancien siège de l\'entreprise.',
                'poi_id' => Poi::where('title', 'Alimentarium')->value('id'),
            ],
            [
                'title' => 'Ateliers de cuisine',
                'content' => 'Le musée propose des ateliers de cuisine pour enfants et adultes, permettant aux visiteurs d\'apprendre et de déguster.',
                'poi_id' => Poi::where('title', 'Alimentarium')->value('id'),
            ],
            [
                'title' => 'Fondation unique',
                'content' => 'La Maison d’Ailleurs a été fondée en 1976 par l\'écrivain Pierre Versins, et est unique en son genre en Europe.',
                'poi_id' => Poi::where('title', 'Maison d’Ailleurs')->value('id'),
            ],
            [
                'title' => 'Collection de science-fiction',
                'content' => 'Le musée abrite une collection impressionnante de livres, films et objets liés à la science-fiction et à l\'utopie.',
                'poi_id' => Poi::where('title', 'Maison d’Ailleurs')->value('id'),
            ],
            [
                'title' => 'Art suisse et international',
                'content' => 'Le Musée Jenisch à Vevey abrite une collection d\'art suisse et international, y compris des œuvres graphiques.',
                'poi_id' => Poi::where('title', 'Musée Jenisch')->value('id'),
            ],
            [
                'title' => 'Expositions temporaires',
                'content' => 'Le musée organise régulièrement des expositions temporaires d\'artistes contemporains et classiques.',
                'poi_id' => Poi::where('title', 'Musée Jenisch')->value('id'),
            ],
            [
                'title' => 'Vue panoramique',
                'content' => 'La Fondation de l’Hermitage offre une vue imprenable sur Lausanne, le lac Léman et les Alpes.',
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id'),
            ],
            [
                'title' => 'Expositions d\'art',
                'content' => 'La fondation présente des expositions temporaires d\'artistes renommés et émergents.',
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id'),
            ],
            [
                'title' => 'Parc familial',
                'content' => 'Le Signal de Bougy est un parc de loisirs idéal pour les familles, offrant des activités pour tous les âges.',
                'poi_id' => Poi::where('title', 'Signal de Bougy')->value('id'),
            ],
            [
                'title' => 'Vue sur le lac',
                'content' => 'Le parc offre une vue panoramique sur le lac Léman et les Alpes.',
                'poi_id' => Poi::where('title', 'Signal de Bougy')->value('id'),
            ],
            [
                'title' => 'Histoire locale',
                'content' => 'Le Musée de Pully présente l\'histoire et le patrimoine de la région de Pully, avec des expositions sur l\'archéologie et l\'histoire locale.',
                'poi_id' => Poi::where('title', 'Musée de Pully')->value('id'),
            ],
            [
                'title' => 'Expositions temporaires',
                'content' => 'Le musée organise des expositions temporaires sur divers thèmes liés à l\'histoire et à la culture locale.',
                'poi_id' => Poi::where('title', 'Musée de Pully')->value('id'),
            ],
            [
                'title' => 'Château médiéval',
                'content' => 'Le Château de Grandson est un magnifique château médiéval surplombant le lac de Neuchâtel.',
                'poi_id' => Poi::where('title', 'Château de Grandson')->value('id'),
            ],
            [
                'title' => 'Musée historique',
                'content' => 'Le château abrite un musée présentant l\'histoire régionale et des expositions sur l\'armement médiéval.',
                'poi_id' => Poi::where('title', 'Château de Grandson')->value('id'),
            ],
            [
                'title' => 'Fête des Vignerons',
                'content' => 'Le Musée de la Confrérie des Vignerons à Vevey est dédié à la célèbre Fête des Vignerons, un événement unique célébré une fois par génération.',
                'poi_id' => Poi::where('title', 'Musée de la Confrérie des Vignerons')->value('id'),
            ],
            [
                'title' => 'Tradition viticole',
                'content' => 'Le musée présente l\'histoire et les traditions de la viticulture dans la région de Vevey.',
                'poi_id' => Poi::where('title', 'Musée de la Confrérie des Vignerons')->value('id'),
            ],
            [
                'title' => 'Musée du vin',
                'content' => 'Le Château d\'Aigle abrite un musée dédié à l\'histoire du vin et de la viticulture.',
                'poi_id' => Poi::where('title', 'Château d\'Aigle')->value('id'),
            ],
            [
                'title' => 'Vues spectaculaires',
                'content' => 'Le château offre une vue imprenable sur les vignobles environnants et les montagnes.',
                'poi_id' => Poi::where('title', 'Château d\'Aigle')->value('id'),
            ],
            [
                'title' => 'Musée de l’informatique',
                'content' => 'Le Musée Bolo, situé à l\'EPFL à Lausanne, expose des ordinateurs historiques et des technologies qui ont marqué l\'évolution de l\'informatique.',
                'poi_id' => Poi::where('title', 'Musée Bolo')->value('id'),
            ],
            [
                'title' => 'Expositions interactives',
                'content' => 'Le musée propose des expositions interactives permettant de découvrir l\'évolution de la technologie informatique.',
                'poi_id' => Poi::where('title', 'Musée Bolo')->value('id'),
            ],
            [
                'title' => 'Paysages naturels',
                'content' => 'Le Parc Naturel Jura Vaudois offre des paysages magnifiques, des sentiers de randonnée et une faune diversifiée.',
                'poi_id' => Poi::where('title', 'Parc Naturel Jura Vaudois')->value('id'),
            ],
            [
                'title' => 'Activités en plein air',
                'content' => 'Le parc propose des activités en plein air telles que la randonnée, le VTT et l\'observation de la faune.',
                'poi_id' => Poi::where('title', 'Parc Naturel Jura Vaudois')->value('id'),
            ],
            [
                'title' => 'Faune et flore',
                'content' => 'Le parc abrite une riche biodiversité, incluant des espèces protégées comme le lynx et le tétras lyre.',
                'poi_id' => Poi::where('title', 'Parc Naturel Jura Vaudois')->value('id'),
            ],
            [
                'title' => 'Plus grand aquarium d\'eau douce',
                'content' => 'Aquatis à Lausanne est le plus grand aquarium-vivarium d\'eau douce en Europe, offrant des expositions sur la vie aquatique de divers continents.',
                'poi_id' => Poi::where('title', 'Aquatis Aquarium-Vivarium')->value('id'),
            ],
            [
                'title' => 'Écosystèmes aquatiques',
                'content' => 'L\'aquarium présente des écosystèmes aquatiques du monde entier, permettant aux visiteurs de découvrir des espèces rares et exotiques.',
                'poi_id' => Poi::where('title', 'Aquatis Aquarium-Vivarium')->value('id'),
            ],
            [
                'title' => 'Musée archéologique',
                'content' => 'Le Musée Romain de Lausanne-Vidy présente les vestiges de la ville romaine de Lousonna, offrant un aperçu fascinant de la vie romaine en Suisse.',
                'poi_id' => Poi::where('title', 'Musée romain de Lausanne-Vidy')->value('id'),
            ],
            [
                'title' => 'Reconstitutions historiques',
                'content' => 'Le musée propose des reconstitutions de bâtiments et de scènes de la vie quotidienne à l\'époque romaine.',
                'poi_id' => Poi::where('title', 'Musée romain de Lausanne-Vidy')->value('id'),
            ],
            [
                'title' => 'Culture du blé',
                'content' => 'La Maison du Blé et du Pain à Echallens explore l\'histoire et les techniques de la culture du blé et de la fabrication du pain, avec des démonstrations en direct.',
                'poi_id' => Poi::where('title', 'Maison du Blé et du Pain')->value('id'),
            ],
            [
                'title' => 'Fabrication traditionnelle',
                'content' => 'Le musée propose des ateliers où les visiteurs peuvent apprendre à faire du pain de manière traditionnelle.',
                'poi_id' => Poi::where('title', 'Maison du Blé et du Pain')->value('id'),
            ],
            [
                'title' => 'Expositions historiques',
                'content' => 'Le musée propose des expositions sur l\'histoire sociale et culturelle de la région.',
                'poi_id' => Poi::where('title', 'Musée du Vieux Montreux')->value('id'),
            ],
            [
                'title' => 'Histoire de Montreux',
                'content' => 'Le Musée du Vieux Montreux conserve et présente l\'histoire locale de Montreux et de ses environs, avec des expositions sur les traditions locales.',
                'poi_id' => Poi::where('title', 'Musée du Vieux Montreux')->value('id'),
            ],
            [
                'title' => 'Collection de jeux',
                'content' => 'Le Musée Suisse du Jeu à La Tour-de-Peilz possède une vaste collection de jeux anciens et modernes, des échecs aux jeux vidéo.',
                'poi_id' => Poi::where('title', 'Musée Suisse du Jeu')->value('id'),
            ],
            [
                'title' => 'Histoire des jeux',
                'content' => 'Le musée explore l\'évolution des jeux à travers les âges et les cultures.',
                'poi_id' => Poi::where('title', 'Musée Suisse du Jeu')->value('id'),
            ],
            [
                'title' => 'Histoire militaire',
                'content' => 'Le Château de Morges abrite plusieurs musées, y compris le Musée militaire vaudois, présentant des expositions sur l\'histoire militaire.',
                'poi_id' => Poi::where('title', 'Château de Morges')->value('id'),
            ],
            [
                'title' => 'Expositions d\'armes',
                'content' => 'Le musée expose une impressionnante collection d\'armes, d\'uniformes et d\'artefacts militaires.',
                'poi_id' => Poi::where('title', 'Château de Morges')->value('id'),
            ],
            [
                'title' => 'Sentiers éducatifs',
                'content' => 'Le jardin offre des sentiers éducatifs pour découvrir les différentes espèces végétales et leurs habitats.',
                'poi_id' => Poi::where('title', 'Le Jardin Botanique de Lausanne')->value('id'),
            ],
            [
                'title' => 'Histoire de Lausanne',
                'content' => 'Le Musée Historique de Lausanne retrace l\'histoire de Lausanne depuis ses origines jusqu\'à nos jours.',
                'poi_id' => Poi::where('title', 'Musée Historique de Lausanne')->value('id'),
            ],
            [
                'title' => 'Expositions permanentes',
                'content' => 'Le musée propose des expositions permanentes sur les périodes clés de l\'histoire de Lausanne.',
                'poi_id' => Poi::where('title', 'Musée Historique de Lausanne')->value('id'),
            ],
            [
                'title' => 'Parc historique',
                'content' => 'Le Parc de Mon Repos à Lausanne est un espace vert historique idéal pour les promenades et les pique-niques.',
                'poi_id' => Poi::where('title', 'Parc de Mon Repos')->value('id'),
            ],
            [
                'title' => 'Sculptures et jardins',
                'content' => 'Le parc abrite de nombreuses sculptures et des jardins bien entretenus.',
                'poi_id' => Poi::where('title', 'Parc de Mon Repos')->value('id'),
            ],
            [
                'title' => 'Église gothique',
                'content' => 'L\'Église Saint-François, située au centre de Lausanne, est connue pour son architecture gothique impressionnante.',
                'poi_id' => Poi::where('title', 'Église Saint-François')->value('id'),
            ],
            [
                'title' => 'Concerts d\'orgue',
                'content' => 'L\'église accueille régulièrement des concerts d\'orgue qui attirent des mélomanes de toute la région.',
                'poi_id' => Poi::where('title', 'Église Saint-François')->value('id'),
            ],
            [
                'title' => 'Science et santé',
                'content' => 'Le Musée de la Main UNIL-CHUV propose des expositions interactives sur la santé, la médecine et les sciences humaines.',
                'poi_id' => Poi::where('title', 'Musée de la Main UNIL-CHUV')->value('id'),
            ],
            [
                'title' => 'Ateliers éducatifs',
                'content' => 'Le musée offre des ateliers et des activités éducatives pour tous les âges.',
                'poi_id' => Poi::where('title', 'Musée de la Main UNIL-CHUV')->value('id'),
            ],
            [
                'title' => 'Place animée',
                'content' => 'La Place de la Palud à Lausanne est connue pour sa fontaine médiévale et son horloge animée qui raconte des histoires locales.',
                'poi_id' => Poi::where('title', 'Place de la Palud')->value('id'),
            ],
            [
                'title' => 'Marchés locaux',
                'content' => 'La place accueille régulièrement des marchés locaux où l\'on peut acheter des produits frais et artisanaux.',
                'poi_id' => Poi::where('title', 'Place de la Palud')->value('id'),
            ],
            [
                'title' => 'Musée d\'art',
                'content' => 'Le Musée Alexis Forel à Morges présente des collections d\'art et des expositions temporaires dans un bâtiment historique.',
                'poi_id' => Poi::where('title', 'Musée Alexis Forel')->value('id'),
            ],
            [
                'title' => 'Expositions artistiques',
                'content' => 'Le musée organise des expositions artistiques de peintures, sculptures et objets d\'art.',
                'poi_id' => Poi::where('title', 'Musée Alexis Forel')->value('id'),
            ],
            [
                'title' => 'Centre nature',
                'content' => 'La Maison de la Rivière à Tolochenaz propose des expositions sur les écosystèmes fluviaux et des activités éducatives.',
                'poi_id' => Poi::where('title', 'La Maison de la Rivière')->value('id'),
            ],
            [
                'title' => 'Activités familiales',
                'content' => 'Le centre offre des activités et des ateliers pour les familles et les enfants.',
                'poi_id' => Poi::where('title', 'La Maison de la Rivière')->value('id'),
            ],
            [
                'title' => 'Station de ski',
                'content' => 'Les Pléiades offrent des activités toute l\'année, y compris la randonnée, le ski et des vues panoramiques sur les Alpes et le lac Léman.',
                'poi_id' => Poi::where('title', 'Les Pléiades')->value('id'),
            ],
            [
                'title' => 'Observatoire astronomique',
                'content' => 'La station abrite également un observatoire astronomique accessible au public.',
                'poi_id' => Poi::where('title', 'Les Pléiades')->value('id'),
            ],
            [
                'title' => 'Château médiéval',
                'content' => 'Le Château de La Sarraz est un château médiéval qui abrite un musée présentant l\'histoire de la région et des expositions d\'art.',
                'poi_id' => Poi::where('title', 'Château de La Sarraz')->value('id'),
            ],
            [
                'title' => 'Événements culturels',
                'content' => 'Le château accueille régulièrement des événements culturels et des expositions temporaires.',
                'poi_id' => Poi::where('title', 'Château de La Sarraz')->value('id'),
            ],
        ];

        foreach ($poiFacts as $poiFact) {
            PoiFact::create($poiFact);
        }
    }
}

