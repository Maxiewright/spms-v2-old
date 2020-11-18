<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecorationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Decoration Table
        Schema::create('decorations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//        Servicepeople Decorations Table
        Schema::create('serviceperson_decoration', function (Blueprint $table) {
            $table->id();
            $table->foreignId('decoration_id')->constrained();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->date('received_on');
            $table->timestamps();
            //SETTING THE PRIMARY KEYS
            $table->unique(['decoration_id', 'serviceperson_number'], 'serviceperson_decoration');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('decoration_serviceperson');
        Schema::dropIfExists('decorations');
    }
}
