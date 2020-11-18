<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Allergy Types Table
        Schema::create('allergy_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

//        Allergy Table
        Schema::create('allergies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('allergy_type_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['name','allergy_type_id'], 'allergy_type_unx');
        });

//        Serviceperson Allergy Table
        Schema::create('serviceperson_allergies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('allergy_id')->constrained();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->text('particulars')->nullable();
            $table->timestamps();
            //SETTING THE PRIMARY KEYS
            $table->unique(['allergy_id', 'serviceperson_number'], 'serviceperson_allergy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergy_types');
        Schema::dropIfExists('allergy_serviceperson');
        Schema::dropIfExists('allergies');
    }
}
