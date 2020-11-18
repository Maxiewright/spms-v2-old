<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Dependents Relationships
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

//      Dependents
        Schema::create('dependents', function (Blueprint $table) {
            $table->bigInteger('pin')->unsigned()->primary();
            $table->date('date_of_birth');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('other_names')->nullable();
            $table->foreignId('relationship_id')->constrained();
            $table->foreignId('gender_id')->constrained();
            $table->foreignId('religion_id')->constrained();
            $table->boolean('is_next_of_kin')->default(false);
            $table->boolean('is_emergency_contact')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });

//        Serviceperson Dependents

        Schema::create('dependent_serviceperson', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dependent_pin')->constrained('dependents', 'pin');
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->unique(['dependent_pin', 'serviceperson_number'], 'serviceperson_dependent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependent_serviceperson');
        Schema::dropIfExists('dependents');
        Schema::dropIfExists('dependent_relationships');
    }
}
