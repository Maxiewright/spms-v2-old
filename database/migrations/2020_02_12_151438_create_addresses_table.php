<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Division or Region Types

        Schema::create('division_or_region_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Division or Regions
        Schema::create('division_or_regions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_or_region_type_id')->constrained();
            $table->string('code')->unique();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        City or Towns
        Schema::create('city_or_towns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('division_or_region_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['name','division_or_region_id']);
        });

//        Address
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->foreignId('city_or_town_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['address1', 'address2']);
        });

        Schema::create('addressables', function (Blueprint $table) {
            $table->bigInteger('address_id');
            $table->bigInteger('addressable_id');
            $table->string('addressable_type');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addressables');
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('city_or_towns');
        Schema::dropIfExists('division_or_regions');
        Schema::dropIfExists('division_or_region_types');
    }
}
