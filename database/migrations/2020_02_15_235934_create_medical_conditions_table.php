<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Medical Conditions Table
        Schema::create('medical_conditions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Serviceperson Medical Condition Table
        Schema::create('serviceperson_medical_conditions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_condition_id')->constrained();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->text('particulars')->nullable();
            $table->timestamps();
            //SETTING THE PRIMARY KEYS
            $table->unique(['medical_condition_id', 'serviceperson_number'], 'serviceperson_medical_condition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_condition_serviceperson');
        Schema::dropIfExists('medical_conditions');
    }
}
