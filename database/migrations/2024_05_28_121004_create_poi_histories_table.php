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
        Schema::create('poi_histories', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_visited')->default(false);
            $table->foreignId('poi_id')
                ->references('id')
                ->on('pois')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('poi_histories');
    }
};
