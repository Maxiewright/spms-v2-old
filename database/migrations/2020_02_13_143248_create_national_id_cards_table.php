<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalIdCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_id_cards', function (Blueprint $table) {
            $table->bigInteger('number')->primary();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->date('date_of_birth');
            $table->foreignId('place_of_birth')->constrained('city_or_towns', 'id');
            $table->foreignId('gender_id')->constrained();
            $table->date('issued_on');
            $table->date('expired_on');
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
        Schema::dropIfExists('national_id_cards');
    }
}
