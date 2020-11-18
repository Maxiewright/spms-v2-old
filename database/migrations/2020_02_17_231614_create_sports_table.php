<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sport_type_id')->constrained();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('serviceperson_sport', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sport_id')->constrained();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->unique(['sport_id', 'serviceperson_number'], 'serviceperson_sport');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serviceperson_sport');
        Schema::dropIfExists('sport_types');
        Schema::dropIfExists('sports');
    }
}
