<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Question;
use App\Models\Quiz;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->delete();

        $questions = [
            [
                'question' => 'Quelle particularité géographique des Terrasses de Lavaux est essentielle pour la viticulture dans cette région classée au patrimoine mondial de l\'UNESCO ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Terrasses de Lavaux')->value('id'),
            ],
            [
                'question' => 'Quel célèbre poète a été inspiré par le Château de Chillon pour écrire "Le Prisonnier de Chillon" ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Château de Chillon')->value('id'),
            ],
            [
                'question' => 'Quel événement annuel unique aux Rochers-de-Naye implique une rencontre avec le Père Noël dans sa maison située à 2 042 mètres d\'altitude ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Montreux - Rochers-de-Naye')->value('id'),
            ],
            [
                'question' => 'Quelle installation interactive du Musée Olympique permet aux visiteurs de tester leurs compétences sportives et de comparer leurs performances à celles des athlètes olympiques ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée Olympique')->value('id'),
            ],
            [
                'question' => 'Quel artefact personnel unique de Charlie Chaplin, exposé à Chaplin\'s World, témoigne de sa carrière prolifique et de son impact sur l\'histoire du cinéma ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Chaplin\'s World')->value('id'),
            ],
            [
                'question' => 'Quelle particularité architecturale de la Cathédrale de Lausanne en fait l\'un des exemples les plus remarquables du style gothique en Suisse ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Cathédrale de Lausanne')->value('id'),
            ],
            [
                'question' => 'Quel phénomène optique peut être observé depuis le sommet de la Tour de Sauvabelin par temps clair, offrant une vue spectaculaire sur les Alpes ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Tour de Sauvabelin')->value('id'),
            ],
            [
                'question' => 'Quel aspect unique de la production viticole est mis en avant au Lavaux Vinorama, permettant aux visiteurs de mieux comprendre les défis et les triomphes des vignerons de Lavaux ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Lavaux Vinorama')->value('id'),
            ],
            [
                'question' => 'Quelle caractéristique géologique impressionnante des Grottes de Vallorbe est mise en valeur par des éclairages spéciaux pour créer une expérience visuelle époustouflante pour les visiteurs ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Grottes de Vallorbe')->value('id'),
            ],
            [
                'question' => 'Quel mécanisme horloger unique, exposé à l\'Espace Horloger, illustre l\'ingéniosité et la précision de l\'horlogerie suisse à travers les âges ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Espace Horloger')->value('id'),
            ],
            [
                'question' => 'Quelle photographie célèbre, exposée au Musée de l’Élysée, a marqué un tournant dans l\'histoire de l\'art photographique ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée de l’Élysée')->value('id'),
            ],
            [
                'question' => 'Quel type de nourriture emblématique, exploré en profondeur à l\'Alimentarium de Vevey, est présenté comme un élément clé de la culture alimentaire mondiale ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Alimentarium')->value('id'),
            ],
            [
                'question' => 'Quel auteur de science-fiction célèbre est mis en avant dans une exposition permanente à la Maison d’Ailleurs pour son influence sur le genre ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Maison d’Ailleurs')->value('id'),
            ],
            [
                'question' => 'Quelle œuvre d\'art particulière, conservée au Musée Jenisch, est considérée comme un chef-d\'œuvre de l\'art suisse ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée Jenisch')->value('id'),
            ],
            [
                'question' => 'Quelle collection spéciale de la Fondation de l’Hermitage à Lausanne offre un aperçu unique sur l\'art impressionniste ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Fondation de l’Hermitage')->value('id'),
            ],
            [
                'question' => 'Quel aspect historique fascinant du parc Signal de Bougy attire les amateurs d\'histoire et de nature chaque année ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Signal de Bougy')->value('id'),
            ],
            [
                'question' => 'Quelle pièce archéologique unique est mise en valeur au Musée de Pully pour illustrer l\'histoire ancienne de la région ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée de Pully')->value('id'),
            ],
            [
                'question' => 'Quel événement marquant de l\'histoire suisse est commémoré par une exposition permanente au Château de Grandson ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Château de Grandson')->value('id'),
            ],
            [
                'question' => 'Quel objet historique de la Fête des Vignerons est exposé au Musée de la Confrérie des Vignerons à Vevey pour illustrer cette tradition séculaire ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée de la Confrérie des Vignerons')->value('id'),
            ],
            [
                'question' => 'Quelle méthode traditionnelle de vinification est présentée au Château d\'Aigle pour montrer l\'évolution de la production de vin dans la région ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Château d\'Aigle')->value('id'),
            ],
            [
                'question' => 'Quel ancien ordinateur emblématique est exposé au Musée Bolo pour illustrer les débuts de l\'informatique ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée Bolo')->value('id'),
            ],
            [
                'question' => 'Quelle espèce rare de faune peut être observée dans le Parc Naturel Jura Vaudois, attirant les amoureux de la nature et les chercheurs ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Parc Naturel Jura Vaudois')->value('id'),
            ],
            [
                'question' => 'Quel écosystème unique est recréé à l\'Aquatis Aquarium-Vivarium, permettant aux visiteurs de découvrir la biodiversité aquatique mondiale ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Aquatis Aquarium-Vivarium')->value('id'),
            ],
            [
                'question' => 'Quel artefact romain exceptionnel est exposé au Musée romain de Lausanne-Vidy, témoignant de l\'importance historique de Lousonna ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée romain de Lausanne-Vidy')->value('id'),
            ],
            [
                'question' => 'Quelle méthode ancestrale de fabrication du pain est démontrée à la Maison du Blé et du Pain à Echallens ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Maison du Blé et du Pain')->value('id'),
            ],
            [
                'question' => 'Quel aspect unique de l\'histoire de Montreux est présenté au Musée du Vieux Montreux, offrant un aperçu de son passé vibrant ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée du Vieux Montreux')->value('id'),
            ],
            [
                'question' => 'Quelle collection rare de jeux historiques est conservée au Musée Suisse du Jeu, offrant un aperçu de l\'évolution des jeux à travers les âges ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée Suisse du Jeu')->value('id'),
            ],
            [
                'question' => 'Quelle période historique est particulièrement bien représentée dans les expositions du Château de Morges, soulignant son importance militaire ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Château de Morges')->value('id'),
            ],
            [
                'question' => 'Quelle plante rare peut être observée au Jardin Botanique de Lausanne, attirant les passionnés de botanique du monde entier ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Le Jardin Botanique de Lausanne')->value('id'),
            ],
            [
                'question' => 'Quel artefact historique unique est exposé au Musée Historique de Lausanne pour illustrer la riche histoire de la ville ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée Historique de Lausanne')->value('id'),
            ],
            [
                'question' => 'Quelle sculpture célèbre peut être admirée au Parc de Mon Repos, offrant une combinaison unique d\'art et de nature ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Parc de Mon Repos')->value('id'),
            ],
            [
                'question' => 'Quel concert d\'orgue célèbre attire des visiteurs du monde entier à l\'Église Saint-François chaque année ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Église Saint-François')->value('id'),
            ],
            [
                'question' => 'Quelle exposition interactive unique au Musée de la Main UNIL-CHUV permet aux visiteurs de découvrir le fonctionnement du cerveau humain à travers des expériences sensorielles ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée de la Main UNIL-CHUV')->value('id'),
            ],
            [
                'question' => 'Quelle sculpture historique orne la fontaine médiévale de la Place de la Palud, racontant des histoires locales de Lausanne ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Place de la Palud')->value('id'),
            ],
            [
                'question' => 'Quelle œuvre d\'art unique, exposée au Musée Alexis Forel, offre un aperçu de l\'histoire et de la culture de Morges à travers les siècles ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Musée Alexis Forel')->value('id'),
            ],
            [
                'question' => 'Quelle activité éducative passionnante peut-on faire à La Maison de la Rivière pour comprendre les écosystèmes fluviaux et la faune locale ?',
                'quiz_id' => Quiz::where('title', 'Quiz - La Maison de la Rivière')->value('id'),
            ],
            [
                'question' => 'Quel phénomène naturel unique peut être observé depuis Les Pléiades, offrant une vue spectaculaire sur les Alpes et le lac Léman en toute saison ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Les Pléiades')->value('id'),
            ],
            [
                'question' => 'Quelle collection d\'art impressionnante est présentée au Château de La Sarraz, mettant en lumière l\'histoire et la culture de la région ?',
                'quiz_id' => Quiz::where('title', 'Quiz - Château de La Sarraz')->value('id'),
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
