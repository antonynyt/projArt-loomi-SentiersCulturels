<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Answer;
use App\Models\Question;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('answers')->delete();

        $answers = [
            //Terrasses de Lavaux
            [
                'answer' => 'Les pentes abruptes orientées vers le lac Léman',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle particularité géographique des Terrasses de Lavaux est essentielle pour la viticulture dans cette région classée au patrimoine mondial de l\'UNESCO ?')->value('id'),
            ],
            [
                'answer' => 'Les vastes plaines fertiles',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle particularité géographique des Terrasses de Lavaux est essentielle pour la viticulture dans cette région classée au patrimoine mondial de l\'UNESCO ?')->value('id'),
            ],
            [
                'answer' => 'Les marais salants naturels',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle particularité géographique des Terrasses de Lavaux est essentielle pour la viticulture dans cette région classée au patrimoine mondial de l\'UNESCO ?')->value('id'),
            ],
            [
                'answer' => 'Les dunes de sable',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle particularité géographique des Terrasses de Lavaux est essentielle pour la viticulture dans cette région classée au patrimoine mondial de l\'UNESCO ?')->value('id'),
            ],
            //Château de Chillon
            [
                'answer' => 'Lord Byron',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel célèbre poète a été inspiré par le Château de Chillon pour écrire "Le Prisonnier de Chillon" ?')->value('id'),
            ],
            [
                'answer' => 'William Wordsworth',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel célèbre poète a été inspiré par le Château de Chillon pour écrire "Le Prisonnier de Chillon" ?')->value('id'),
            ],
            [
                'answer' => 'Samuel Taylor Coleridge',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel célèbre poète a été inspiré par le Château de Chillon pour écrire "Le Prisonnier de Chillon" ?')->value('id'),
            ],
            [
                'answer' => 'Percy Bysshe Shelley',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel célèbre poète a été inspiré par le Château de Chillon pour écrire "Le Prisonnier de Chillon" ?')->value('id'),
            ],
            //Montreux - Rochers-de-Naye
            [
                'answer' => 'La Maison du Père Noël',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel événement annuel unique aux Rochers-de-Naye implique une rencontre avec le Père Noël dans sa maison située à 2 042 mètres d\'altitude ?')->value('id'),
            ],
            [
                'answer' => 'Le Marché de Noël',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel événement annuel unique aux Rochers-de-Naye implique une rencontre avec le Père Noël dans sa maison située à 2 042 mètres d\'altitude ?')->value('id'),
            ],
            [
                'answer' => 'La Parade des Lumières',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel événement annuel unique aux Rochers-de-Naye implique une rencontre avec le Père Noël dans sa maison située à 2 042 mètres d\'altitude ?')->value('id'),
            ],
            [
                'answer' => 'La Fête de la Montagne',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel événement annuel unique aux Rochers-de-Naye implique une rencontre avec le Père Noël dans sa maison située à 2 042 mètres d\'altitude ?')->value('id'),
            ],
            //Musée Olympique
            [
                'answer' => 'L’Exposition "Train like an Olympian"',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle installation interactive du Musée Olympique permet aux visiteurs de tester leurs compétences sportives et de comparer leurs performances à celles des athlètes olympiques ?')->value('id'),
            ],
            [
                'answer' => 'L’Exposition "Olympic Games History"',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle installation interactive du Musée Olympique permet aux visiteurs de tester leurs compétences sportives et de comparer leurs performances à celles des athlètes olympiques ?')->value('id'),
            ],
            [
                'answer' => 'L’Exposition "Olympic Torch Relay"',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle installation interactive du Musée Olympique permet aux visiteurs de tester leurs compétences sportives et de comparer leurs performances à celles des athlètes olympiques ?')->value('id'),
            ],
            [
                'answer' => 'L’Exposition "Winners and Medals"',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle installation interactive du Musée Olympique permet aux visiteurs de tester leurs compétences sportives et de comparer leurs performances à celles des athlètes olympiques ?')->value('id'),
            ],
            //Chaplin's World
            [
                'answer' => 'Son chapeau melon et sa canne',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel artefact personnel unique de Charlie Chaplin, exposé à Chaplin\'s World, témoigne de sa carrière prolifique et de son impact sur l\'histoire du cinéma ?')->value('id'),
            ],
            [
                'answer' => 'Son costume de clown',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel artefact personnel unique de Charlie Chaplin, exposé à Chaplin\'s World, témoigne de sa carrière prolifique et de son impact sur l\'histoire du cinéma ?')->value('id'),
            ],
            [
                'answer' => 'Son premier appareil photo',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel artefact personnel unique de Charlie Chaplin, exposé à Chaplin\'s World, témoigne de sa carrière prolifique et de son impact sur l\'histoire du cinéma ?')->value('id'),
            ],
            [
                'answer' => 'Ses chaussures de danse',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel artefact personnel unique de Charlie Chaplin, exposé à Chaplin\'s World, témoigne de sa carrière prolifique et de son impact sur l\'histoire du cinéma ?')->value('id'),
            ],
            //Cathédrale de Lausanne
            [
                'answer' => 'Le portail peint',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle particularité architecturale de la Cathédrale de Lausanne en fait l\'un des exemples les plus remarquables du style gothique en Suisse ?')->value('id'),
            ],
            [
                'answer' => 'Les vitraux modernistes',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle particularité architecturale de la Cathédrale de Lausanne en fait l\'un des exemples les plus remarquables du style gothique en Suisse ?')->value('id'),
            ],
            [
                'answer' => 'Les gargouilles de dragon',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle particularité architecturale de la Cathédrale de Lausanne en fait l\'un des exemples les plus remarquables du style gothique en Suisse ?')->value('id'),
            ],
            [
                'answer' => 'La crypte romane',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle particularité architecturale de la Cathédrale de Lausanne en fait l\'un des exemples les plus remarquables du style gothique en Suisse ?')->value('id'),
            ],
            //Tour de Sauvabelin
            [
                'answer' => 'Le rayon vert',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel phénomène optique peut être observé depuis le sommet de la Tour de Sauvabelin par temps clair, offrant une vue spectaculaire sur les Alpes ?')->value('id'),
            ],
            [
                'answer' => 'Un mirage de chaleur',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel phénomène optique peut être observé depuis le sommet de la Tour de Sauvabelin par temps clair, offrant une vue spectaculaire sur les Alpes ?')->value('id'),
            ],
            [
                'answer' => 'La couronne de gloire',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel phénomène optique peut être observé depuis le sommet de la Tour de Sauvabelin par temps clair, offrant une vue spectaculaire sur les Alpes ?')->value('id'),
            ],
            [
                'answer' => 'Le phénomène des Alpes roses au lever ou au coucher du soleil',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel phénomène optique peut être observé depuis le sommet de la Tour de Sauvabelin par temps clair, offrant une vue spectaculaire sur les Alpes ?')->value('id'),
            ],
            //Lavaux Vinorama
            [
                'answer' => 'L’utilisation de drones pour surveiller les vignobles',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel aspect unique de la production viticole est mis en avant au Lavaux Vinorama, permettant aux visiteurs de mieux comprendre les défis et les triomphes des vignerons de Lavaux ?')->value('id'),
            ],
            [
                'answer' => 'La culture en terrasse et son impact sur le terroir',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel aspect unique de la production viticole est mis en avant au Lavaux Vinorama, permettant aux visiteurs de mieux comprendre les défis et les triomphes des vignerons de Lavaux ?')->value('id'),
            ],
            [
                'answer' => 'Les techniques de marketing innovantes pour vendre le vin',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel aspect unique de la production viticole est mis en avant au Lavaux Vinorama, permettant aux visiteurs de mieux comprendre les défis et les triomphes des vignerons de Lavaux ?')->value('id'),
            ],
            [
                'answer' => 'L’usage des énergies renouvelables dans la vinification',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel aspect unique de la production viticole est mis en avant au Lavaux Vinorama, permettant aux visiteurs de mieux comprendre les défis et les triomphes des vignerons de Lavaux ?')->value('id'),
            ],
            //Grottes de Vallorbe
            [
                'answer' => 'Les cristaux géants',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle caractéristique géologique impressionnante des Grottes de Vallorbe est mise en valeur par des éclairages spéciaux pour créer une expérience visuelle époustouflante pour les visiteurs ?')->value('id'),
            ],
            [
                'answer' => 'Les stalactites et stalagmites',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle caractéristique géologique impressionnante des Grottes de Vallorbe est mise en valeur par des éclairages spéciaux pour créer une expérience visuelle époustouflante pour les visiteurs ?')->value('id'),
            ],
            [
                'answer' => 'Les rivières souterraines phosphorescentes',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle caractéristique géologique impressionnante des Grottes de Vallorbe est mise en valeur par des éclairages spéciaux pour créer une expérience visuelle époustouflante pour les visiteurs ?')->value('id'),
            ],
            [
                'answer' => 'Les fossiles d’animaux préhistoriques',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle caractéristique géologique impressionnante des Grottes de Vallorbe est mise en valeur par des éclairages spéciaux pour créer une expérience visuelle époustouflante pour les visiteurs ?')->value('id'),
            ],
            //Espace Horloger
            [
                'answer' => 'Le tourbillon',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel mécanisme horloger unique, exposé à l\'Espace Horloger, illustre l\'ingéniosité et la précision de l\'horlogerie suisse à travers les âges ?')->value('id'),
            ],
            [
                'answer' => 'Le mouvement automatique à quartz',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel mécanisme horloger unique, exposé à l\'Espace Horloger, illustre l\'ingéniosité et la précision de l\'horlogerie suisse à travers les âges ?')->value('id'),
            ],
            [
                'answer' => 'La montre connectée',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel mécanisme horloger unique, exposé à l\'Espace Horloger, illustre l\'ingéniosité et la précision de l\'horlogerie suisse à travers les âges ?')->value('id'),
            ],
            [
                'answer' => 'Le chronographe solaire',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel mécanisme horloger unique, exposé à l\'Espace Horloger, illustre l\'ingéniosité et la précision de l\'horlogerie suisse à travers les âges ?')->value('id'),
            ],
            //Musée de l’Élysée
            [
                'answer' => 'Le Baiser de l’Hôtel de Ville par Robert Doisneau',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle photographie célèbre, exposée au Musée de l’Élysée, a marqué un tournant dans l\'histoire de l\'art photographique ?')->value('id'),
            ],
            [
                'answer' => 'La Fille à la fleur par Marc Riboud',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle photographie célèbre, exposée au Musée de l’Élysée, a marqué un tournant dans l\'histoire de l\'art photographique ?')->value('id'),
            ],
            [
                'answer' => 'La Petite Fille au ballon rouge par Steve McCurry',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle photographie célèbre, exposée au Musée de l’Élysée, a marqué un tournant dans l\'histoire de l\'art photographique ?')->value('id'),
            ],
            [
                'answer' => 'Le Nu provençal par Lucien Clergue',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle photographie célèbre, exposée au Musée de l’Élysée, a marqué un tournant dans l\'histoire de l\'art photographique ?')->value('id'),
            ],
            //Alimentarium
            [
                'answer' => 'Le pain',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel type de nourriture emblématique, exploré en profondeur à l\'Alimentarium de Vevey, est présenté comme un élément clé de la culture alimentaire mondiale ?')->value('id'),
            ],
            [
                'answer' => 'Le fromage',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel type de nourriture emblématique, exploré en profondeur à l\'Alimentarium de Vevey, est présenté comme un élément clé de la culture alimentaire mondiale ?')->value('id'),
            ],
            [
                'answer' => 'Le chocolat',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel type de nourriture emblématique, exploré en profondeur à l\'Alimentarium de Vevey, est présenté comme un élément clé de la culture alimentaire mondiale ?')->value('id'),
            ],
            [
                'answer' => 'Le vin',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel type de nourriture emblématique, exploré en profondeur à l\'Alimentarium de Vevey, est présenté comme un élément clé de la culture alimentaire mondiale ?')->value('id'),
            ],
            //Maison d’Ailleurs
            [
                'answer' => 'Isaac Asimov',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel auteur de science-fiction célèbre est mis en avant dans une exposition permanente à la Maison d’Ailleurs pour son influence sur le genre ?')->value('id'),
            ],
            [
                'answer' => 'Arthur C. Clarke',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel auteur de science-fiction célèbre est mis en avant dans une exposition permanente à la Maison d’Ailleurs pour son influence sur le genre ?')->value('id'),
            ],
            [
                'answer' => 'Jules Verne',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel auteur de science-fiction célèbre est mis en avant dans une exposition permanente à la Maison d’Ailleurs pour son influence sur le genre ?')->value('id'),
            ],
            [
                'answer' => 'Philip K. Dick',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel auteur de science-fiction célèbre est mis en avant dans une exposition permanente à la Maison d’Ailleurs pour son influence sur le genre ?')->value('id'),
            ],
            //Musée Jenisch
            [
                'answer' => 'La Nuit étoilée par Vincent van Gogh',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle œuvre d\'art particulière, conservée au Musée Jenisch, est considérée comme un chef-d\'œuvre de l\'art suisse ?')->value('id'),
            ],
            [
                'answer' => 'Le Cri par Edvard Munch',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle œuvre d\'art particulière, conservée au Musée Jenisch, est considérée comme un chef-d\'œuvre de l\'art suisse ?')->value('id'),
            ],
            [
                'answer' => 'Le Bouvier par Ferdinand Hodler',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle œuvre d\'art particulière, conservée au Musée Jenisch, est considérée comme un chef-d\'œuvre de l\'art suisse ?')->value('id'),
            ],
            [
                'answer' => 'La Liseuse par Jean-Étienne Liotard',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle œuvre d\'art particulière, conservée au Musée Jenisch, est considérée comme un chef-d\'œuvre de l\'art suisse ?')->value('id'),
            ],
            //Fondation de l’Hermitage
            [
                'answer' => 'Une collection d\'art moderne',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle collection spéciale de la Fondation de l’Hermitage à Lausanne offre un aperçu unique sur l\'art impressionniste ?')->value('id'),
            ],
            [
                'answer' => 'Une collection de sculptures antiques',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle collection spéciale de la Fondation de l’Hermitage à Lausanne offre un aperçu unique sur l\'art impressionniste ?')->value('id'),
            ],
            [
                'answer' => 'Une collection d\'art impressionniste',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle collection spéciale de la Fondation de l’Hermitage à Lausanne offre un aperçu unique sur l\'art impressionniste ?')->value('id'),
            ],
            [
                'answer' => 'Une collection de photographies contemporaines',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle collection spéciale de la Fondation de l’Hermitage à Lausanne offre un aperçu unique sur l\'art impressionniste ?')->value('id'),
            ],
            //Signal de Bougy
            [
                'answer' => 'Les ruines d\'un ancien temple romain',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel aspect historique fascinant du parc Signal de Bougy attire les amateurs d\'histoire et de nature chaque année ?')->value('id'),
            ],
            [
                'answer' => 'Un ancien village médiéval',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel aspect historique fascinant du parc Signal de Bougy attire les amateurs d\'histoire et de nature chaque année ?')->value('id'),
            ],
            [
                'answer' => 'Les vestiges d\'une ancienne carrière',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel aspect historique fascinant du parc Signal de Bougy attire les amateurs d\'histoire et de nature chaque année ?')->value('id'),
            ],
            [
                'answer' => 'Un ancien moulin à eau',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel aspect historique fascinant du parc Signal de Bougy attire les amateurs d\'histoire et de nature chaque année ?')->value('id'),
            ],
            //Musée de Pully
            [
                'answer' => 'Un sarcophage égyptien',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle pièce archéologique unique est mise en valeur au Musée de Pully pour illustrer l\'histoire ancienne de la région ?')->value('id'),
            ],
            [
                'answer' => 'Un casque de gladiateur',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle pièce archéologique unique est mise en valeur au Musée de Pully pour illustrer l\'histoire ancienne de la région ?')->value('id'),
            ],
            [
                'answer' => 'Une stèle funéraire romaine',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle pièce archéologique unique est mise en valeur au Musée de Pully pour illustrer l\'histoire ancienne de la région ?')->value('id'),
            ],
            [
                'answer' => 'Un navire viking',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle pièce archéologique unique est mise en valeur au Musée de Pully pour illustrer l\'histoire ancienne de la région ?')->value('id'),
            ],
            //Château de Grandson
            [
                'answer' => 'La bataille de Grandson',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel événement marquant de l\'histoire suisse est commémoré par une exposition permanente au Château de Grandson ?')->value('id'),
            ],
            [
                'answer' => 'La bataille de Sempach',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel événement marquant de l\'histoire suisse est commémoré par une exposition permanente au Château de Grandson ?')->value('id'),
            ],
            [
                'answer' => 'La bataille de Morgarten',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel événement marquant de l\'histoire suisse est commémoré par une exposition permanente au Château de Grandson ?')->value('id'),
            ],
            [
                'answer' => 'La bataille de Marignan',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel événement marquant de l\'histoire suisse est commémoré par une exposition permanente au Château de Grandson ?')->value('id'),
            ],
            //Musée de la Confrérie des Vignerons
            [
                'answer' => 'Un pressoir à vin médiéval',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel objet historique de la Fête des Vignerons est exposé au Musée de la Confrérie des Vignerons à Vevey pour illustrer cette tradition séculaire ?')->value('id'),
            ],
            [
                'answer' => 'Un drapeau de la Fête des Vignerons',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel objet historique de la Fête des Vignerons est exposé au Musée de la Confrérie des Vignerons à Vevey pour illustrer cette tradition séculaire ?')->value('id'),
            ],
            [
                'answer' => 'Une ancienne bouteille de vin',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel objet historique de la Fête des Vignerons est exposé au Musée de la Confrérie des Vignerons à Vevey pour illustrer cette tradition séculaire ?')->value('id'),
            ],
            [
                'answer' => 'Un ancien livre de recettes de vin',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel objet historique de la Fête des Vignerons est exposé au Musée de la Confrérie des Vignerons à Vevey pour illustrer cette tradition séculaire ?')->value('id'),
            ],
            //Château d'Aigle
            [
                'answer' => 'La vinification en amphores',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle méthode traditionnelle de vinification est présentée au Château d\'Aigle pour montrer l\'évolution de la production de vin dans la région ?')->value('id'),
            ],
            [
                'answer' => 'La fermentation en cuves ouvertes',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle méthode traditionnelle de vinification est présentée au Château d\'Aigle pour montrer l\'évolution de la production de vin dans la région ?')->value('id'),
            ],
            [
                'answer' => 'L’utilisation de levures sauvages',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle méthode traditionnelle de vinification est présentée au Château d\'Aigle pour montrer l\'évolution de la production de vin dans la région ?')->value('id'),
            ],
            [
                'answer' => 'La macération carbonique',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle méthode traditionnelle de vinification est présentée au Château d\'Aigle pour montrer l\'évolution de la production de vin dans la région ?')->value('id'),
            ],
            //Musée Bolo
            [
                'answer' => 'IBM 1401',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel ancien ordinateur emblématique est exposé au Musée Bolo pour illustrer les débuts de l\'informatique ?')->value('id'),
            ],
            [
                'answer' => 'Apple I',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel ancien ordinateur emblématique est exposé au Musée Bolo pour illustrer les débuts de l\'informatique ?')->value('id'),
            ],
            [
                'answer' => 'Commodore 64',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel ancien ordinateur emblématique est exposé au Musée Bolo pour illustrer les débuts de l\'informatique ?')->value('id'),
            ],
            [
                'answer' => 'Altair 8800',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel ancien ordinateur emblématique est exposé au Musée Bolo pour illustrer les débuts de l\'informatique ?')->value('id'),
            ],
            //Parc Naturel Jura Vaudois
            [
                'answer' => 'Le lynx boréal',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle espèce rare de faune peut être observée dans le Parc Naturel Jura Vaudois, attirant les amoureux de la nature et les chercheurs ?')->value('id'),
            ],
            [
                'answer' => 'L’ours brun',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle espèce rare de faune peut être observée dans le Parc Naturel Jura Vaudois, attirant les amoureux de la nature et les chercheurs ?')->value('id'),
            ],
            [
                'answer' => 'Le loup gris',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle espèce rare de faune peut être observée dans le Parc Naturel Jura Vaudois, attirant les amoureux de la nature et les chercheurs ?')->value('id'),
            ],
            [
                'answer' => 'Le bouquetin des Alpes',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle espèce rare de faune peut être observée dans le Parc Naturel Jura Vaudois, attirant les amoureux de la nature et les chercheurs ?')->value('id'),
            ],
            //Aquatis Aquarium-Vivarium
            [
                'answer' => 'Les écosystèmes d\'eau douce du monde entier',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel écosystème unique est recréé à l\'Aquatis Aquarium-Vivarium, permettant aux visiteurs de découvrir la biodiversité aquatique mondiale ?')->value('id'),
            ],
            [
                'answer' => 'Les écosystèmes marins des océans tropicaux',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel écosystème unique est recréé à l\'Aquatis Aquarium-Vivarium, permettant aux visiteurs de découvrir la biodiversité aquatique mondiale ?')->value('id'),
            ],
            [
                'answer' => 'Les écosystèmes des récifs coralliens',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel écosystème unique est recréé à l\'Aquatis Aquarium-Vivarium, permettant aux visiteurs de découvrir la biodiversité aquatique mondiale ?')->value('id'),
            ],
            [
                'answer' => 'Les écosystèmes des mangroves',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel écosystème unique est recréé à l\'Aquatis Aquarium-Vivarium, permettant aux visiteurs de découvrir la biodiversité aquatique mondiale ?')->value('id'),
            ],
            //Musée romain de Lausanne-Vidy
            [
                'answer' => 'Un portrait en mosaïque de César',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel artefact romain exceptionnel est exposé au Musée romain de Lausanne-Vidy, témoignant de l\'importance historique de Lousonna ?')->value('id'),
            ],
            [
                'answer' => 'Une statue en bronze d\'un empereur romain',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel artefact romain exceptionnel est exposé au Musée romain de Lausanne-Vidy, témoignant de l\'importance historique de Lousonna ?')->value('id'),
            ],
            [
                'answer' => 'Une maquette de bateau romain',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel artefact romain exceptionnel est exposé au Musée romain de Lausanne-Vidy, témoignant de l\'importance historique de Lousonna ?')->value('id'),
            ],
            [
                'answer' => 'Une mosaïque de la villa romaine',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel artefact romain exceptionnel est exposé au Musée romain de Lausanne-Vidy, témoignant de l\'importance historique de Lousonna ?')->value('id'),
            ],
            //Maison du Blé et du Pain
            [
                'answer' => 'La cuisson dans des fours en argile',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle méthode ancestrale de fabrication du pain est démontrée à la Maison du Blé et du Pain à Echallens ?')->value('id'),
            ],
            [
                'answer' => 'La fermentation à l\'air libre',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle méthode ancestrale de fabrication du pain est démontrée à la Maison du Blé et du Pain à Echallens ?')->value('id'),
            ],
            [
                'answer' => 'La mouture à la meule de pierre',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle méthode ancestrale de fabrication du pain est démontrée à la Maison du Blé et du Pain à Echallens ?')->value('id'),
            ],
            [
                'answer' => 'Le pétrissage à la main',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle méthode ancestrale de fabrication du pain est démontrée à la Maison du Blé et du Pain à Echallens ?')->value('id'),
            ],
            //Musée du Vieux Montreux
            [
                'answer' => 'La construction du chemin de fer',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel aspect unique de l\'histoire de Montreux est présenté au Musée du Vieux Montreux, offrant un aperçu de son passé vibrant ?')->value('id'),
            ],
            [
                'answer' => 'La transformation de la ville en station balnéaire',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel aspect unique de l\'histoire de Montreux est présenté au Musée du Vieux Montreux, offrant un aperçu de son passé vibrant ?')->value('id'),
            ],
            [
                'answer' => 'Les invasions barbares',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel aspect unique de l\'histoire de Montreux est présenté au Musée du Vieux Montreux, offrant un aperçu de son passé vibrant ?')->value('id'),
            ],
            [
                'answer' => 'Les batailles médiévales locales',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel aspect unique de l\'histoire de Montreux est présenté au Musée du Vieux Montreux, offrant un aperçu de son passé vibrant ?')->value('id'),
            ],
            //Musée Suisse du Jeu
            [
                'answer' => 'Les échecs en ivoire de Chine',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle collection rare de jeux historiques est conservée au Musée Suisse du Jeu, offrant un aperçu de l\'évolution des jeux à travers les âges ?')->value('id'),
            ],
            [
                'answer' => 'Les jeux de société égyptiens',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle collection rare de jeux historiques est conservée au Musée Suisse du Jeu, offrant un aperçu de l\'évolution des jeux à travers les âges ?')->value('id'),
            ],
            [
                'answer' => 'Les jeux de cartes anciens',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle collection rare de jeux historiques est conservée au Musée Suisse du Jeu, offrant un aperçu de l\'évolution des jeux à travers les âges ?')->value('id'),
            ],
            [
                'answer' => 'Les figurines de soldats romains',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle collection rare de jeux historiques est conservée au Musée Suisse du Jeu, offrant un aperçu de l\'évolution des jeux à travers les âges ?')->value('id'),
            ],
            //Château de Morges
            [
                'answer' => 'La période napoléonienne',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle période historique est particulièrement bien représentée dans les expositions du Château de Morges, soulignant son importance militaire ?')->value('id'),
            ],
            [
                'answer' => 'L\'Antiquité romaine',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle période historique est particulièrement bien représentée dans les expositions du Château de Morges, soulignant son importance militaire ?')->value('id'),
            ],
            [
                'answer' => 'La Renaissance',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle période historique est particulièrement bien représentée dans les expositions du Château de Morges, soulignant son importance militaire ?')->value('id'),
            ],
            [
                'answer' => 'Le Moyen Âge',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle période historique est particulièrement bien représentée dans les expositions du Château de Morges, soulignant son importance militaire ?')->value('id'),
            ],
            //Le Jardin Botanique de Lausanne
            [
                'answer' => 'Le Nénuphar géant d\'Amazonie',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle plante rare peut être observée au Jardin Botanique de Lausanne, attirant les passionnés de botanique du monde entier ?')->value('id'),
            ],
            [
                'answer' => 'La Rafflesia arnoldii',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle plante rare peut être observée au Jardin Botanique de Lausanne, attirant les passionnés de botanique du monde entier ?')->value('id'),
            ],
            [
                'answer' => 'Le Baobab',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle plante rare peut être observée au Jardin Botanique de Lausanne, attirant les passionnés de botanique du monde entier ?')->value('id'),
            ],
            [
                'answer' => 'Le Gingko biloba',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle plante rare peut être observée au Jardin Botanique de Lausanne, attirant les passionnés de botanique du monde entier ?')->value('id'),
            ],
            //Musée Historique de Lausanne
            [
                'answer' => 'Le blason médiéval de Lausanne',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel artefact historique unique est exposé au Musée Historique de Lausanne pour illustrer la riche histoire de la ville ?')->value('id'),
            ],
            [
                'answer' => 'Un fragment de l\'aqueduc romain',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel artefact historique unique est exposé au Musée Historique de Lausanne pour illustrer la riche histoire de la ville ?')->value('id'),
            ],
            [
                'answer' => 'Une couronne de la reine Berthe',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel artefact historique unique est exposé au Musée Historique de Lausanne pour illustrer la riche histoire de la ville ?')->value('id'),
            ],
            [
                'answer' => 'Un casque viking',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel artefact historique unique est exposé au Musée Historique de Lausanne pour illustrer la riche histoire de la ville ?')->value('id'),
            ],
            //Parc de Mon Repos
            [
                'answer' => 'La Fontaine de Neptune',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle sculpture célèbre peut être admirée au Parc de Mon Repos, offrant une combinaison unique d\'art et de nature ?')->value('id'),
            ],
            [
                'answer' => 'Le Penseur de Rodin',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle sculpture célèbre peut être admirée au Parc de Mon Repos, offrant une combinaison unique d\'art et de nature ?')->value('id'),
            ],
            [
                'answer' => 'La Vénus de Milo',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle sculpture célèbre peut être admirée au Parc de Mon Repos, offrant une combinaison unique d\'art et de nature ?')->value('id'),
            ],
            [
                'answer' => 'Le David de Michel-Ange',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle sculpture célèbre peut être admirée au Parc de Mon Repos, offrant une combinaison unique d\'art et de nature ?')->value('id'),
            ],
            //Église Saint-François
            [
                'answer' => 'Les Concerts de Noël',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel concert d\'orgue célèbre attire des visiteurs du monde entier à l\'Église Saint-François chaque année ?')->value('id'),
            ],
            [
                'answer' => 'Le Festival de Jazz',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel concert d\'orgue célèbre attire des visiteurs du monde entier à l\'Église Saint-François chaque année ?')->value('id'),
            ],
            [
                'answer' => 'Les Nuits de la Musique',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel concert d\'orgue célèbre attire des visiteurs du monde entier à l\'Église Saint-François chaque année ?')->value('id'),
            ],
            [
                'answer' => 'Les Concerts de Pâques',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel concert d\'orgue célèbre attire des visiteurs du monde entier à l\'Église Saint-François chaque année ?')->value('id'),
            ],
            //Musée de la Main UNIL-CHUV
            [
                'answer' => 'Le Labyrinthe des Neurosciences',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle exposition interactive unique au Musée de la Main UNIL-CHUV permet aux visiteurs de découvrir le fonctionnement du cerveau humain à travers des expériences sensorielles ?')->value('id'),
            ],
            [
                'answer' => 'L’Exploration du Système Solaire',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle exposition interactive unique au Musée de la Main UNIL-CHUV permet aux visiteurs de découvrir le fonctionnement du cerveau humain à travers des expériences sensorielles ?')->value('id'),
            ],
            [
                'answer' => 'L’Odyssée de l’Espace',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle exposition interactive unique au Musée de la Main UNIL-CHUV permet aux visiteurs de découvrir le fonctionnement du cerveau humain à travers des expériences sensorielles ?')->value('id'),
            ],
            [
                'answer' => 'Le Voyage à Travers le Corps Humain',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle exposition interactive unique au Musée de la Main UNIL-CHUV permet aux visiteurs de découvrir le fonctionnement du cerveau humain à travers des expériences sensorielles ?')->value('id'),
            ],
            //Place de la Palud
            [
                'answer' => 'La statue de Justice',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle sculpture historique orne la fontaine médiévale de la Place de la Palud, racontant des histoires locales de Lausanne ?')->value('id'),
            ],
            [
                'answer' => 'La statue de Neptune',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle sculpture historique orne la fontaine médiévale de la Place de la Palud, racontant des histoires locales de Lausanne ?')->value('id'),
            ],
            [
                'answer' => 'La statue de Mercure',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle sculpture historique orne la fontaine médiévale de la Place de la Palud, racontant des histoires locales de Lausanne ?')->value('id'),
            ],
            [
                'answer' => 'La statue de Vénus',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle sculpture historique orne la fontaine médiévale de la Place de la Palud, racontant des histoires locales de Lausanne ?')->value('id'),
            ],
            //Musée Alexis Forel
            [
                'answer' => 'Le diorama de la Bataille de Morges',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle œuvre d\'art unique, exposée au Musée Alexis Forel, offre un aperçu de l\'histoire et de la culture de Morges à travers les siècles ?')->value('id'),
            ],
            [
                'answer' => 'Le portrait du Roi Soleil',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle œuvre d\'art unique, exposée au Musée Alexis Forel, offre un aperçu de l\'histoire et de la culture de Morges à travers les siècles ?')->value('id'),
            ],
            [
                'answer' => 'La tapisserie de Bayeux',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle œuvre d\'art unique, exposée au Musée Alexis Forel, offre un aperçu de l\'histoire et de la culture de Morges à travers les siècles ?')->value('id'),
            ],
            [
                'answer' => 'La fresque de la Renaissance',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle œuvre d\'art unique, exposée au Musée Alexis Forel, offre un aperçu de l\'histoire et de la culture de Morges à travers les siècles ?')->value('id'),
            ],
            //La Maison de la Rivière
            [
                'answer' => 'Des ateliers de découverte des poissons locaux',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle activité éducative passionnante peut-on faire à La Maison de la Rivière pour comprendre les écosystèmes fluviaux et la faune locale ?')->value('id'),
            ],
            [
                'answer' => 'Des excursions en canoë sur le lac',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle activité éducative passionnante peut-on faire à La Maison de la Rivière pour comprendre les écosystèmes fluviaux et la faune locale ?')->value('id'),
            ],
            [
                'answer' => 'Des séances de pêche sportive',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle activité éducative passionnante peut-on faire à La Maison de la Rivière pour comprendre les écosystèmes fluviaux et la faune locale ?')->value('id'),
            ],
            [
                'answer' => 'Des cours de plongée sous-marine',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle activité éducative passionnante peut-on faire à La Maison de la Rivière pour comprendre les écosystèmes fluviaux et la faune locale ?')->value('id'),
            ],
            //Les Pléiades
            [
                'answer' => 'Les cercles de cultures naturels',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quel phénomène naturel unique peut être observé depuis Les Pléiades, offrant une vue spectaculaire sur les Alpes et le lac Léman en toute saison ?')->value('id'),
            ],
            [
                'answer' => 'Les marées basses',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel phénomène naturel unique peut être observé depuis Les Pléiades, offrant une vue spectaculaire sur les Alpes et le lac Léman en toute saison ?')->value('id'),
            ],
            [
                'answer' => 'Les aurores boréales',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel phénomène naturel unique peut être observé depuis Les Pléiades, offrant une vue spectaculaire sur les Alpes et le lac Léman en toute saison ?')->value('id'),
            ],
            [
                'answer' => 'Les éruptions solaires',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quel phénomène naturel unique peut être observé depuis Les Pléiades, offrant une vue spectaculaire sur les Alpes et le lac Léman en toute saison ?')->value('id'),
            ],
            //Château de La Sarraz
            [
                'answer' => 'La collection d’armures médiévales',
                'is_correct' => true,
                'question_id' => Question::where('question', 'Quelle collection d\'art impressionnante est présentée au Château de La Sarraz, mettant en lumière l\'histoire et la culture de la région ?')->value('id'),
            ],
            [
                'answer' => 'La collection d’icônes religieuses',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle collection d\'art impressionnante est présentée au Château de La Sarraz, mettant en lumière l\'histoire et la culture de la région ?')->value('id'),
            ],
            [
                'answer' => 'La collection de sculptures modernes',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle collection d\'art impressionnante est présentée au Château de La Sarraz, mettant en lumière l\'histoire et la culture de la région ?')->value('id'),
            ],
            [
                'answer' => 'La collection de peintures impressionnistes',
                'is_correct' => false,
                'question_id' => Question::where('question', 'Quelle collection d\'art impressionnante est présentée au Château de La Sarraz, mettant en lumière l\'histoire et la culture de la région ?')->value('id'),
            ],
        ];

        foreach ($answers as $answer) {
            Answer::create($answer);
        }
    }
}
