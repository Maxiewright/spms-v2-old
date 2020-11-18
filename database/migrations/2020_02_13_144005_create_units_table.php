<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        Battalion
        Schema::create('battalions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        companies
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->foreignId('battalion_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });

//        Platoons Table
        Schema::create('platoons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->foreignId('company_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
//        Sections Table

        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Serviceperson Unit Table
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('company_id')->constrained();
            $table->foreignId('platoon_id')->nullable()->constrained();
            $table->foreignId('section_id')->nullable()->constrained();
            $table->date('joined_on');
            $table->date('posted_on')->nullable();
            $table->date('left_on')->nullable();
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
        Schema::dropIfExists('units');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('platoons');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('battalions');
    }
}
