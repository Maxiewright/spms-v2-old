<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Weights Table
        Schema::create('weights', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Serviceperson Weight Table
        Schema::create('serviceperson_weight', function (Blueprint $table) {
            $table->id();
            $table->foreignId('weight_id')->constrained();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->date('weighed_on');
            $table->timestamps();
            //SETTING THE PRIMARY KEYS
            $table->unique(['weight_id', 'serviceperson_number'], 'serviceperson_weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serviceperson_weight');
        Schema::dropIfExists('weights');
    }
}
