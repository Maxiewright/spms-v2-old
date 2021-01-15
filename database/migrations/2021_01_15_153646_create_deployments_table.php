<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deployments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('deployment_type_id');
            $table->foreignId('deployment_country_id')->constrained();
            $table->date('from');
            $table->date('to')->nullable();
            $table->text('particulars')->nullable();
            $table->timestamps();
        });

        //Types
        Schema::create('deployment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        //Countries
        Schema::create('deployment_countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
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
        Schema::dropIfExists('deployment_types');
        Schema::dropIfExists('deployment_countries');
        Schema::dropIfExists('deployments');
    }
}
