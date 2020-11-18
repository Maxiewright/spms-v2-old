<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Phone Number Type
        Schema::create('phone_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Phone Numbers
        Schema::create('phone_numbers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('number')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Phone Numberables
        Schema::create('phone_numberables', function (Blueprint $table) {
            $table->foreignId('phone_type_id')->constrained();
            $table->bigInteger('phone_number_id');
            $table->bigInteger('phone_numberable_id');
            $table->string('phone_numberable_type');
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
        Schema::dropIfExists('phone_numberables');
        Schema::dropIfExists('phone_types');
        Schema::dropIfExists('phone_numbers');
    }
}
