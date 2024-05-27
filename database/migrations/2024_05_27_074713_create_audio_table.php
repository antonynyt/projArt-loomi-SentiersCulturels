<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Poi;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audio', function (Blueprint $table) {
            $table->id();
            // title, descr, src_link, author, date, lang
            $table->string('title');
            $table->string('descr');
            $table->string('src_link');
            $table->string('author');
            $table->date('date');
            $table->string('lang');
            $table->bigInteger('poi_id')->unsigned();
            $table->foreign('poi_id')
                    ->references('id')
                    ->on('pois')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audio');
    }
};
