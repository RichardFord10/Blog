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
        Schema::create('imdbs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('rank')->unique();
            $table->string('title');
            $table->string('genre');
            $table->text('description');
            $table->string('director');
            $table->text('actors');
            $table->year('year');
            $table->integer('runtime_minutes');
            $table->decimal('rating', 3, 1);
            $table->bigInteger('votes');
            $table->decimal('revenue_millions', 10, 2)->nullable();
            $table->integer('metascore')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imdb');
    }
};
