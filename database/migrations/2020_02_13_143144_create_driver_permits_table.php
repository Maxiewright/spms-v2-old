<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverPermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers_permit_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('drivers_permit_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('drivers_permit_transaction_codes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('drivers_permits', function (Blueprint $table) {
            $table->bigInteger('number')->primary()->unsigned();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('drivers_permit_type_id')->constrained();
            $table->foreignId('drivers_permit_class_id')->constrained();
            $table->foreignId('drivers_permit_transaction_code_id')->constrained();
            $table->date('issued_on');
            $table->date('expired_on');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['serviceperson_number', 'drivers_permit_type_id'], 'serviceperson_drivers_permit_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers_permit_types');
        Schema::dropIfExists('drivers_permit_classes');
        Schema::dropIfExists('drivers_permit_transaction_codes');
        Schema::dropIfExists('drivers_permits');
    }
}
