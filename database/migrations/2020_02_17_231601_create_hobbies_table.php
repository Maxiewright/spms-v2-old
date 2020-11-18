<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHobbiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        hobby types
        Schema::create('hobby_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        hobbies
        Schema::create('hobbies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hobby_type_id')->constrained();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Serviceperson hobbies
        Schema::create('serviceperson_hobby', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hobby_id')->constrained();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->unique(['hobby_id', 'serviceperson_number'], 'serviceperson_hobby');
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
        Schema::dropIfExists('hobby_serviceperson');
        Schema::dropIfExists('hobbies');
        Schema::dropIfExists('hobby_types');

    }
}
