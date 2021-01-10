<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  Types
        Schema::create('event_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Statuses
        Schema::create('event_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Venues
        Schema::create('event_venues', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Events
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image');
            $table->foreignId('event_type_id')->constrained();
            $table->foreignId('event_status_id')->constrained();
            $table->foreignId('event_venue_id')->constrained();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->timestamps();
        });

        // Organisers
        // Individual
        Schema::create('serviceperson_event_organiser', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->timestamps();
        });

        // Unit
        Schema::create('unit_event_organiser', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained();
            $table->foreignId('unit_id')->constrained();
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
        Schema::dropIfExists('event_types');
        Schema::dropIfExists('event_statuses');
        Schema::dropIfExists('event_venues');
        Schema::dropIfExists('events');
        Schema::dropIfExists('serviceperson_event_organiser');
        Schema::dropIfExists('unit_event_organiser');
    }
}
