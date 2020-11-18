<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Heights Table
        Schema::create('heights', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Serviceperson Height Table
        Schema::create('serviceperson_height', function (Blueprint $table) {
            $table->id();
            $table->foreignId('height_id')->constrained();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->date('measured_on');
            $table->timestamps();
            //SETTING THE PRIMARY KEYS
            $table->unique(['height_id', 'serviceperson_number'], 'serviceperson_height');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('height_serviceperson');
        Schema::dropIfExists('heights');
    }
}
