<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMilitaryIdCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('military_id_cards', function (Blueprint $table) {
            $table->bigInteger('number')->primary()->unsigned();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
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
        Schema::dropIfExists('military_id_cards');
    }
}
