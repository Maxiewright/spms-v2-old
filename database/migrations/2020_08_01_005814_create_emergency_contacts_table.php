<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->string('first_name' );
            $table->string('last_name');
            $table->string('other_names' )->nullable();
            $table->foreignId('relationship_id')->constrained();
            $table->foreignId('gender_id')->constrained();
            $table->string('employer')->nullable();
            $table->boolean('is_primary')->default(true);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['serviceperson_number', 'is_primary'], 'serviceperson_contact_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emergency_contacts');
    }
}
