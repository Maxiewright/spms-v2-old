<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicepersonCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Course Types

        Schema::create('course_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//        Course Institutions
        Schema::create('course_institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->foreignId('course_type_id')->constrained();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });

//        Courses Table
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//        Course Institutions
        Schema::create('course_course_institution', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained();
            $table->foreignId('course_institution_id')
                ->constrained()
                ->onDelete('cascade');
            $table->unique(['course_id','course_institution_id'],'course_course_institution');
            $table->timestamps();
            $table->softDeletes();
        });

//        Course Qualifications
        Schema::create('course_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//        Serviceperson courses
        Schema::create('serviceperson_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number')->onDelete('cascade');
            $table->foreignId('course_type_id')->constrained();
            $table->foreignId('course_institution_id')->constrained();
            $table->foreignId('course_id')->constrained();
            $table->foreignId('course_qualification_id')->constrained();
            $table->Integer('place_on_course')->unsigned()->nullable();
            $table->boolean('is_resettlement')->default(false);
            $table->boolean('is_in-service')->default(false);
            $table->date('started_on');
            $table->date('ended_on');
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

        Schema::dropIfExists('serviceperson_courses');
        Schema::dropIfExists('course_qualifications');
        Schema::dropIfExists('course_course_institution');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('course_institutions');
        Schema::dropIfExists('course_types');

    }
}
