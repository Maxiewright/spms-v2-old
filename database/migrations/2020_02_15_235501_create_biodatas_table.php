<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Eye colours Table
        Schema::create('eye_colours', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
//        Hair Colour Table
        Schema::create('hair_colours', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
//        Skin Colour Table
        Schema::create('skin_colours', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
//        Blood Type Table
        Schema::create('blood_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Bio Data Table

        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('eye_colour_id')->constrained();
            $table->foreignId('hair_colour_id')->constrained();
            $table->foreignId('skin_colour_id')->constrained();
            $table->foreignId('blood_type_id')->constrained();
            $table->tinyInteger('wears_glasses')->default(0);
            $table->tinyInteger('wears_contacts')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodatas');
        Schema::dropIfExists('eye_colours');
        Schema::dropIfExists('hair_colours');
        Schema::dropIfExists('skin_colours');
        Schema::dropIfExists('blood_types');
    }
}
