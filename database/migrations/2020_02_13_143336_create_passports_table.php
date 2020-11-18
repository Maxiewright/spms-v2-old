<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->string('number')->primary();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->date('issued_on');
            $table->date('expired_on');
            $table->timestamps();
            $table->unique(['number', 'serviceperson_number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passports');
    }
}
