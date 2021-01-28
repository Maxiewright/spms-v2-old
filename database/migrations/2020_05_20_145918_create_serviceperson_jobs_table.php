<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicepersonJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
//    Branches
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Branch Establishment
        Schema::create('branch_establishment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('rank_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('establishment');
            $table->timestamps();
            $table->softDeletes();

        });

//    Streams
        Schema::create('streams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained();
            $table->string('name')->unique();
            $table->string('slug')->nullable()->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Stream Establishment
        Schema::create('stream_establishment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stream_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('rank_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('establishment');
            $table->timestamps();
            $table->softDeletes();
        });

//    Career Paths
        Schema::create('career_paths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stream_id')->constrained();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });

//        Career Path  Establishment
        Schema::create('career_path_establishment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_path_id')->constrained();
            $table->foreignId('rank_id')->constrained();
            $table->integer('establishment');
            $table->timestamps();
            $table->softDeletes();
        });

//    specialties
        Schema::create('specialties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('career_path_id')->constrained();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });


//        Job Titles
        Schema::create('job_title_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('job_titles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->foreignId('job_title_category_id')->constrained();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//        Job Classes
        Schema::create('job_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//      Jobs
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_title_id')->constrained();
            $table->foreignId('job_class_id')->nullable()->constrained();
            $table->foreignId('career_path_id')->constrained();
            $table->foreignId('rank_id')->constrained();
            $table->integer('establishment');
            $table->string('job_description_path')->nullable();
            $table->unique(['job_title_id', 'job_class_id', 'career_path_id', 'rank_id'], 'job_with_class_unique_id');
            $table->unique(['job_title_id', 'career_path_id', 'rank_id'], 'job_without_class_unique_id');
            $table->timestamps();
            $table->softDeletes();
        });

//    Serviceperson Job
        Schema::create('job_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('job_id')->constrained();
            $table->date('started_on');
            $table->date('ended_on')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['serviceperson_number', 'job_id', 'started_on'], 'serviceperson_appointment');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_appointments');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_classes');
        Schema::dropIfExists('job_titles');
        Schema::dropIfExists('job_title_categories');
        Schema::dropIfExists('specialties');
        Schema::dropIfExists('career_path_establishment');
        Schema::dropIfExists('career_paths');
        Schema::dropIfExists('stream_establishment');
        Schema::dropIfExists('streams');
        Schema::dropIfExists('branch_establishment');
        Schema::dropIfExists('branches');

    }
}
