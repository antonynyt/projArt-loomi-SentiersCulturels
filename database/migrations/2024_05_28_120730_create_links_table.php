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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->string('type');
            $table->bigInteger('poi_id')->unsigned()->nullable();
            $table->bigInteger('path_id')->unsigned()->nullable();
            $table->foreign('poi_id')
                ->references('id')
                ->on('pois')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('path_id')
                ->references('id')
                ->on('paths')
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
        Schema::dropIfExists('links');
    }
};
