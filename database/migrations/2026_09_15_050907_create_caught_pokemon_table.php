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
        Schema::create('caught_pokemon', function (Blueprint $table) {
            $table->id();

            $table->integer('pokeapi_id');
            $table->string('name');
            $table->string('image_url')->nullable();
            $table->boolean('is_shiny')->default(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caught_pokemon');
    }
};
