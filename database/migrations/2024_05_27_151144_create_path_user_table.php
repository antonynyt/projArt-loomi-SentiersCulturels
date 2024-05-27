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
        Schema::create('path_user', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('path_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->boolean('is_visited')->default(false);
            $table->boolean('is_favourite')->default(false);
            $table->foreign('path_id')->references('id')->on('paths')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('path_user');
    }
};
