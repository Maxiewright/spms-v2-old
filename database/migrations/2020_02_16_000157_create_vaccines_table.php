<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('serviceperson_vaccines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vaccine_id')->constrained();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->date('received_on');
            $table->string('place_administered')->nullable();
            $table->timestamps();
            //SETTING THE PRIMARY KEYS
            $table->unique(['vaccine_id', 'serviceperson_number'], 'serviceperson_vaccine');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serviceperson_vaccine');
        Schema::dropIfExists('vaccines');
    }
}
