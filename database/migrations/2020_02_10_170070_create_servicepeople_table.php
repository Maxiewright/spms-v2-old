<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicepeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviceperson_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sos_reasons', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('servicepeople', function (Blueprint $table) {
            $table->foreignId('formation_id')->default(1)->constrained();
            $table->bigInteger('number')->primary()->unsigned();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('other_names')->nullable();
            $table->foreignId('ethnicity_id')->constrained();
            $table->foreignId('marital_status_id')->constrained();
            $table->foreignId('religion_id')->constrained();
            $table->foreignId('serviceperson_status_id')->default(1)->constrained();
            $table->date('sos_on')->default(null)->nullable();
            $table->foreignId('sos_reason_id')->nullable()->constrained();
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
        Schema::dropIfExists('serviceperson_statuses');
        Schema::dropIfExists('sos_reasons');
        Schema::dropIfExists('servicepeople');
    }
}
