<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Path;

class PathsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('path_poi')->delete();
        DB::table('paths')->delete();

        $paths = [
            [
                'title' => 'Découverte de Lausanne',
                'descr' => 'Une balade à travers Lausanne, découvrant ses sites historiques et ses vues panoramiques.',
                'duration' => 507.1,
                'distance' => 704.2,
                'ascent' => 29.9,
                'descent' => 33.3,
                'difficulty' => 'Facile',
                'is_handicap_accessible' => false,
                'geojson' => '{"type":"FeatureCollection","bbox":[6.633532,46.521056,501,6.637025,46.522951,514],"features":[{"bbox":[6.633532,46.521056,501,6.637025,46.522951,514],"type":"Feature","properties":{"ascent":29.9,"descent":33.3,"segments":[{"distance":220.1,"duration":158.5,"steps":[{"distance":109.4,"duration":78.8,"type":11,"instruction":"Démarrez en direction de l’Ouest sur Place de la Cathédrale","name":"Place de la Cathédrale","way_points":[0,7]},{"distance":28,"duration":20.2,"type":0,"instruction":"Tournez à gauche sur Escaliers du Marché","name":"Escaliers du Marché","way_points":[7,11]},{"distance":24.2,"duration":17.4,"type":1,"instruction":"Tournez à droite","name":"-","way_points":[11,12]},{"distance":9.5,"duration":6.8,"type":5,"instruction":"Tournez légèrement à droite","name":"-","way_points":[12,13]},{"distance":14.6,"duration":10.5,"type":0,"instruction":"Tournez à gauche","name":"-","way_points":[13,15]},{"distance":34.3,"duration":24.7,"type":6,"instruction":"Continuez tout droit sur Escalier de l\'Université","name":"Escalier de l\'Université","way_points":[15,18]},{"distance":0,"duration":0,"type":10,"instruction":"Arrivé à Escalier de l\'Université, destination sur la droite","name":"-","way_points":[18,18]}],"ascent":11,"descent":18},{"distance":484.1,"duration":348.6,"steps":[{"distance":34.3,"duration":24.7,"type":11,"instruction":"Démarrez en direction du Sud-Est sur Place Madeleine","name":"Place Madeleine","way_points":[18,21]},{"distance":67.8,"duration":48.8,"type":1,"instruction":"Tournez à droite","name":"-","way_points":[21,24]},{"distance":25.9,"duration":18.6,"type":12,"instruction":"Tournez à gauche","name":"-","way_points":[24,25]},{"distance":124.5,"duration":89.7,"type":4,"instruction":"Tournez légerement à gauche","name":"-","way_points":[25,32]},{"distance":31.9,"duration":23,"type":1,"instruction":"Tournez à droite","name":"-","way_points":[32,38]},{"distance":53.7,"duration":38.7,"type":0,"instruction":"Tournez à gauche","name":"-","way_points":[38,49]},{"distance":146,"duration":105.1,"type":0,"instruction":"Tournez à gauche","name":"-","way_points":[49,54]},{"distance":0,"duration":0,"type":10,"instruction":"Arrivé à votre destination, sur la gauche","name":"-","way_points":[54,54]}],"ascent":18.9429931640625,"descent":15.309494018554688}],"summary":{"distance":704.2,"duration":507.1},"way_points":[0,18,54]},"geometry":{"coordinates":[[6.635787,46.522306,513],[6.63537,46.522346,513],[6.635149,46.522365,513],[6.634998,46.522377,503],[6.634769,46.522396,503],[6.634644,46.522455,506.7],[6.634646,46.5226,514],[6.634651,46.522628,514],[6.634589,46.522633,514],[6.634481,46.522611,514],[6.634398,46.522572,514],[6.634322,46.522538,514],[6.634108,46.522699,506],[6.634074,46.522781,506],[6.633992,46.522789,506],[6.633885,46.522799,506],[6.63364,46.522842,506],[6.633587,46.522915,506],[6.633532,46.522951,506],[6.633587,46.522915,506],[6.63364,46.522842,506],[6.633885,46.522799,506],[6.633942,46.522686,504.4],[6.634133,46.522426,503.7],[6.634194,46.522232,503],[6.634299,46.522011,503],[6.634425,46.521883,503],[6.63461,46.52178,503],[6.634839,46.521711,505.4],[6.635079,46.52169,513],[6.635528,46.521691,513],[6.63561,46.521679,513],[6.635725,46.521623,501],[6.635717,46.521589,501],[6.635753,46.521517,501],[6.63577,46.521467,501],[6.635777,46.521447,501],[6.6358,46.521379,501],[6.63581,46.521345,501],[6.635825,46.521346,501],[6.63591,46.521359,503],[6.635927,46.521361,503],[6.636009,46.521373,503],[6.636025,46.521367,503],[6.636039,46.521345,503],[6.636043,46.521339,503],[6.636062,46.52131,503],[6.636074,46.52129,503],[6.636118,46.521221,503],[6.636185,46.521056,503],[6.6363,46.521099,506.9],[6.636518,46.521235,507.7],[6.636748,46.521532,509.9],[6.636864,46.521723,509.7],[6.637025,46.522179,509.6]],"type":"LineString"}}],"metadata":{"attribution":"openrouteservice.org | OpenStreetMap contributors","service":"routing","timestamp":1717418072718,"query":{"coordinates":[[6.6358,46.5222],[6.6336,46.523],[6.6369,46.5222]],"profile":"foot-walking","format":"geojson","units":"m","language":"fr","instructions":true,"elevation":true},"engine":{"version":"8.0.1","build_date":"2024-05-14T10:47:52Z","graph_date":"2024-05-30T00:21:50Z"}}}',
                'theme_id' => DB::table('themes')->where('title', 'Histoire')->value('id'),
            ],
        ];

        foreach ($paths as $path) {
            Path::create($path);
        }
    }
}
