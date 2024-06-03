<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Photo;
use App\Models\Poi;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('photos')->delete();

        $photos = [
            [
                'title' => 'Terrasses de Lavaux',
                'descr' => 'Vue sur les vignobles en terrasses de Lavaux, classés au patrimoine mondial de l\'UNESCO.',
                'author' => 'Soumya Basu',
                'year' => 2018,
                'link' => 'https://upload.wikimedia.org/wikipedia/commons/5/5c/Lavaux_vineyards.jpg',
                'poi_id' => Poi::where('title', 'Terrasses de Lavaux')->value('id'),
            ],
            [
                'title' => 'Château de Chillon',
                'descr' => 'Le château de Chillon sur le lac Léman.',
                'author' => 'Benjamin Gimmel',
                'year' => 2005,
                'link' => 'https://upload.wikimedia.org/wikipedia/commons/f/f7/Schweiz_Schloss_Chillon_Gesamtansicht.jpg',
                'poi_id' => Poi::where('title', 'Château de Chillon')->value('id'),
            ],
            [
                'title' => 'Montreux - Rochers-de-Naye',
                'descr' => 'Vue sur la gare des Rochers-de-Naye et l\'arrivée de la course Montreux-Les-Rochers-de-Naye 2018.',
                'author' => 'Johann Conus',
                'year' => 2018,
                'link' => 'https://upload.wikimedia.org/wikipedia/commons/e/ea/Montreux_Les_Rochers-de-Naye_2018_finish.jpg',
                'poi_id' => Poi::where('title', 'Montreux - Rochers-de-Naye')->value('id'),
            ],
            [
                'title' => 'Musée Olympique',
                'descr' => 'Façade du musée, personnes entrant dans le Musée Olympique à Lausanne, Suisse.',
                'author' => 'ProtoplasmaKid',
                'year' => 2022,
                'link' => 'https://upload.wikimedia.org/wikipedia/commons/9/9d/Museo_Ol%C3%ADmpico_%28Lausana%29_-_2.jpg',
                'poi_id' => Poi::where('title', 'Musée Olympique')->value('id'),
            ],
            [
                'title' => 'Chaplin\'s World',
                'descr' => 'Entrée du Chaplin\'s World à Corsier-sur-Vevey.',
                'author' => 'Arpingstone',
                'year' => 2017,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Chaplin\'s World')->value('id'),
            ],
            [
                'title' => 'Cathédrale de Lausanne depuis le Champ de l\'Air',
                'descr' => 'La cathédrale de Lausanne (Suisse) vue depuis le lieu-dit du Champ de l\'Air',
                'author' => 'Gzzz',
                'year' => 2009,
                'link' => 'https://upload.wikimedia.org/wikipedia/commons/f/f2/Cath%C3%A9drale_de_Lausanne_depuis_le_Champ_de_l%27Air.JPG',
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id'),
            ],
            [
                'title' => 'Grottes de Vallorbe',
                'descr' => 'Stalactites et stalacmites dans les Grottes de Vallorbe.',
                'author' => 'Micha L. Rieser',
                'year' => 2009,
                'link' => 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Vallorbe_Grottos_2.jpg',
                'poi_id' => Poi::where('title', 'Grottes de Vallorbe')->value('id'),
            ],
            [
                'title' => 'Espace Horloger',
                'descr' => 'Exposition à l\'Espace Horloger dans la Vallée de Joux.',
                'author' => 'Pierre Rosselle',
                'year' => 2014,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Espace Horloger')->value('id'),
            ],
            [
                'title' => 'Tour de Sauvabelin',
                'descr' => 'La Tour de Sauvabelin, dans le bois du même nom (Lausanne, Suisse)',
                'author' => 'Hugues Mitton',
                'year' => 2013,
                'link' => 'https://upload.wikimedia.org/wikipedia/commons/0/09/Tour_de_Sauvabelin_Lausanne.jpg',
                'poi_id' => Poi::where('title', 'Tour de Sauvabelin')->value('id'),
            ],
            [
                'title' => 'Lavaux Vinorama',
                'descr' => 'Le Lavaux Vinorama, site sur les communes de Puidoux et de Rivaz, Suisse',
                'author' => 'Ben Bender',
                'year' => 2015,
                'link' => 'https://upload.wikimedia.org/wikipedia/commons/9/98/Rivaz%2C_Switzerland_-_panoramio.jpg',
                'poi_id' => Poi::where('title', 'Lavaux Vinorama')->value('id'),
            ],
            [
                'title' => 'Musée de l’Élysée',
                'descr' => 'Musée de l’Élysée à Lausanne.',
                'author' => 'Sandro Senn',
                'year' => 2009,
                'link' => 'https://upload.wikimedia.org/wikipedia/commons/5/55/Mus%C3%A9e_de_l%27Elys%C3%A9e_4.jpg',
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id'),
            ],
            [
                'title' => 'Alimentarium, Musée de l\'alimentation à Vevey',
                'descr' => 'Statue de Charlie Chaplin, qui a vécu de nombreuses années dans la région, devant l\'Alimentarium, sur la promenade du bord du lac de Vevey.',
                'author' => 'Henk Bekker',
                'year' => 2013,
                'link' => 'https://upload.wikimedia.org/wikipedia/commons/e/ed/Alimentarium_Food_Museum_in_Vevey_%289173942762%29.jpg',
                'poi_id' => Poi::where('title', 'Alimentarium')->value('id'),
            ],
            [
                'title' => 'Maison d’Ailleurs',
                'descr' => 'La façade de la Maison d’Ailleurs à Yverdon-les-Bains.',
                'author' => 'Rama',
                'year' => 2010,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Maison d’Ailleurs')->value('id'),
            ],
            [
                'title' => 'Musée Jenisch',
                'descr' => 'Musée Jenisch à Vevey.',
                'author' => 'Claude Jaccard',
                'year' => 2010,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Musée Jenisch')->value('id'),
            ],
            [
                'title' => 'Fondation de l’Hermitage',
                'descr' => 'Vue extérieure de la Fondation de l’Hermitage à Lausanne.',
                'author' => 'Zaymbee',
                'year' => 2011,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id'),
            ],
            [
                'title' => 'Signal de Bougy',
                'descr' => 'Vue panoramique depuis le Signal de Bougy.',
                'author' => 'Christian M. Küng',
                'year' => 2007,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Signal de Bougy')->value('id'),
            ],
            [
                'title' => 'Musée de Pully',
                'descr' => 'Entrée du Musée de Pully.',
                'author' => 'Ricardo André Frantz',
                'year' => 2009,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Musée de Pully')->value('id'),
            ],
            [
                'title' => 'Château de Grandson',
                'descr' => 'Le château médiéval de Grandson.',
                'author' => 'Patrick Giraud',
                'year' => 2013,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Château de Grandson')->value('id'),
            ],
            [
                'title' => 'Musée de la Confrérie des Vignerons',
                'descr' => 'Musée de la Confrérie des Vignerons à Vevey.',
                'author' => 'Patrick Giraud',
                'year' => 2013,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Musée de la Confrérie des Vignerons')->value('id'),
            ],
            [
                'title' => 'Château d\'Aigle',
                'descr' => 'Le Château d\'Aigle et ses vignobles.',
                'author' => 'Adrian Michael',
                'year' => 2013,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Château d\'Aigle')->value('id'),
            ],
            [
                'title' => 'Musée Bolo',
                'descr' => 'Le Musée Bolo à Lausanne.',
                'author' => 'Museebolo',
                'year' => 2015,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Musée Bolo')->value('id'),
            ],
            [
                'title' => 'Parc Naturel Jura Vaudois',
                'descr' => 'Paysage du Parc Naturel Jura Vaudois.',
                'author' => 'Ludo29',
                'year' => 2008,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Parc Naturel Jura Vaudois')->value('id'),
            ],
            [
                'title' => 'Aquatis Aquarium-Vivarium',
                'descr' => 'Entrée de l\'Aquatis Aquarium-Vivarium à Lausanne.',
                'author' => 'Sandrine Ziegler-Musi',
                'year' => 2018,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Aquatis Aquarium-Vivarium')->value('id'),
            ],
            [
                'title' => 'Musée romain de Lausanne-Vidy',
                'descr' => 'Extérieur du Musée romain de Lausanne-Vidy.',
                'author' => 'Roland Zumbuehl',
                'year' => 2014,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Musée romain de Lausanne-Vidy')->value('id'),
            ],
            [
                'title' => 'Maison du Blé et du Pain',
                'descr' => 'La Maison du Blé et du Pain à Echallens.',
                'author' => 'Pierre Jeanneret',
                'year' => 2009,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Maison du Blé et du Pain')->value('id'),
            ],
            [
                'title' => 'Musée du Vieux Montreux',
                'descr' => 'Entrée du Musée du Vieux Montreux.',
                'author' => 'Sandro Senn',
                'year' => 2014,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Musée du Vieux Montreux')->value('id'),
            ],
            [
                'title' => 'Musée Suisse du Jeu',
                'descr' => 'Entrée du Musée Suisse du Jeu à La Tour-de-Peilz.',
                'author' => 'Patrick Nouhailler',
                'year' => 2014,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Musée Suisse du Jeu')->value('id'),
            ],
            [
                'title' => 'Château de Morges',
                'descr' => 'Le Château de Morges.',
                'author' => 'Christoph Röser',
                'year' => 2013,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Château de Morges')->value('id'),
            ],
            [
                'title' => 'Le Jardin Botanique de Lausanne',
                'descr' => 'Le Jardin Botanique de Lausanne.',
                'author' => 'Christophe Bovet',
                'year' => 2014,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Le Jardin Botanique de Lausanne')->value('id'),
            ],
            [
                'title' => 'Musée Historique de Lausanne',
                'descr' => 'Musée Historique de Lausanne.',
                'author' => 'Javiersanp',
                'year' => 2017,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Musée Historique de Lausanne')->value('id'),
            ],
            [
                'title' => 'Parc de Mon Repos',
                'descr' => 'Le parc de Mon Repos à Lausanne.',
                'author' => 'Aconcagua',
                'year' => 2009,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Parc de Mon Repos')->value('id'),
            ],
            [
                'title' => 'Église Saint-François',
                'descr' => 'L\'Église Saint-François à Lausanne.',
                'author' => 'Sandrine Ziegler-Musi',
                'year' => 2018,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Église Saint-François')->value('id'),
            ],
            [
                'title' => 'Musée de la Main UNIL-CHUV',
                'descr' => 'Musée de la Main UNIL-CHUV.',
                'author' => 'Sandrine Ziegler-Musi',
                'year' => 2018,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Musée de la Main UNIL-CHUV')->value('id'),
            ],
            [
                'title' => 'Place de la Palud',
                'descr' => 'La Place de la Palud à Lausanne.',
                'author' => 'Lapo Luchini',
                'year' => 2008,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Place de la Palud')->value('id'),
            ],
            [
                'title' => 'Musée Alexis Forel',
                'descr' => 'Musée Alexis Forel à Morges.',
                'author' => 'Ramessos',
                'year' => 2010,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Musée Alexis Forel')->value('id'),
            ],
            [
                'title' => 'La Maison de la Rivière',
                'descr' => 'La Maison de la Rivière à Tolochenaz.',
                'author' => 'Pymouss',
                'year' => 2018,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'La Maison de la Rivière')->value('id'),
            ],
            [
                'title' => 'Les Pléiades',
                'descr' => 'Vue panoramique depuis les Pléiades.',
                'author' => 'Christian M. Küng',
                'year' => 2007,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Les Pléiades')->value('id'),
            ],
            [
                'title' => 'Château de La Sarraz',
                'descr' => 'Le Château de La Sarraz.',
                'author' => 'Adrian Michael',
                'year' => 2013,
                'link' => asset('storage/img/poi/poi-default-photo.jpg'),
                'poi_id' => Poi::where('title', 'Château de La Sarraz')->value('id'),
            ],
        ];


        foreach ($photos as $photo) {
            Photo::create($photo);
        }
    }
}
