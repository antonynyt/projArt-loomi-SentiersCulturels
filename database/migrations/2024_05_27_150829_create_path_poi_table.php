<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('path_poi', function (Blueprint $table) {
            $table->id();
            $table->integer('position')->unsigned();
            $table->bigInteger('path_id')->unsigned();
            $table->bigInteger('poi_id')->unsigned();
            $table->foreign('path_id')->references('id')->on('paths')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->foreign('poi_id')->references('id')->on('pois')
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
        Schema::dropIfExists('path_poi');
    }
};
