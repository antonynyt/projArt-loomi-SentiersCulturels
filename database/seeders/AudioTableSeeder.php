<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Audio;
use App\Models\Poi;

class AudioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('audio')->delete();

        $audio = [
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Terrasses de Lavaux')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Château de Chillon')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Montreux - Rochers-de-Naye')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée Olympique')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Chaplin\'s World')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Cathédrale de Lausanne')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Tour de Sauvabelin')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Lavaux Vinorama')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Grottes de Vallorbe')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Espace Horloger')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée de l’Élysée')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Alimentarium')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Maison d’Ailleurs')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée Jenisch')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Fondation de l’Hermitage')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Signal de Bougy')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée de Pully')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Château de Grandson')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée de la Confrérie des Vignerons')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Château d\'Aigle')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée Bolo')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Parc Naturel Jura Vaudois')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Aquatis Aquarium-Vivarium')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée romain de Lausanne-Vidy')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Maison du Blé et du Pain')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée du Vieux Montreux')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée Suisse du Jeu')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Château de Morges')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Le Jardin Botanique de Lausanne')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée Historique de Lausanne')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Parc de Mon Repos')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Église Saint-François')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée de la Main UNIL-CHUV')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Place de la Palud')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Musée Alexis Forel')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'La Maison de la Rivière')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Les Pléiades')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2023-05-16',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Château de La Sarraz')->value('id')
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2024-06-04',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Espace des Inventions')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2024-06-04',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Vignoble en terrasses (chemin de randonnée)')->value('id'),
            ],
            [
                'title' => 'Default audio',
                'descr' => 'Aesthetic Boomopera - Podcast LoFi Lounge intro Music (15s) Seconds',
                'src_link' => asset('storage/audio/pois/poi-default-audio.mp3'),
                'author' => 'Lidérc',
                'date' => '2024-06-04',
                'lang' => 'fr',
                'poi_id' => Poi::where('title', 'Palais de Rumine')->value('id'),
            ],
        ];


        foreach ($audio as $audio) {
            Audio::create($audio);
        }
    }
}
