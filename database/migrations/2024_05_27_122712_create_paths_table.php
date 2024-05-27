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
        Schema::create('paths', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('short_descr');
            $table->string('descr');
            $table->integer('duration');
            $table->integer('distance');
            $table->integer('ascent');
            $table->integer('descent');
            $table->string('difficulty');
            $table->boolean('is_handicap_accessible')->default(false);
            $table->json('geojson');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paths');
    }
};
