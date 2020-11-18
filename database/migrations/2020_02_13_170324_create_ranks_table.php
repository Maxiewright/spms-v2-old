<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Ranks Table
        Schema::create('ranks', function (Blueprint $table) {
            $table->id();
            $table->string('grade')->unique();
            $table->string('regiment')->unique();
            $table->string('regiment_slug')->unique();
            $table->string('coast_guard')->unique();
            $table->string('coast_guard_slug')->unique();
            $table->string('air_guard')->unique();
            $table->string('air_guard_slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//      Serviceperson Rank Table
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rank_id')->constrained();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->unique(['rank_id', 'serviceperson_number'], 'serviceperson_rank_primary');
            $table->date('promoted_on');
            $table->date('substantive_on')->nullable();
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
        Schema::dropIfExists('promotions');
        Schema::dropIfExists('ranks');
    }
}
