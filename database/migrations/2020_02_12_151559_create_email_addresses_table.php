<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Email Address Types
        Schema::create('email_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//       Email Addresses
        Schema::create('email_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamps();
        });

//        Email Addressable
        Schema::create('email_addressables', function (Blueprint $table) {
            $table->foreignId('email_type_id')->constrained();
            $table->foreignId('email_address_id');
            $table->foreignId('email_addressable_id');
            $table->string('email_addressable_type');
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
        Schema::dropIfExists('email_addressables');
        Schema::dropIfExists('email_types');
        Schema::dropIfExists('email_addresses');
    }
}
