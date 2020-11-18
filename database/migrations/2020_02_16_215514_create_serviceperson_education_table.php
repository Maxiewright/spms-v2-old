<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicepersonEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        Education Levels
        Schema::create('education_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//       Grades
        Schema::create('education_grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('education_level_id')->constrained();
            $table->string('grade')->unique();
            $table->text('description');
            $table->string('us_grade_equivalent')->unique();
            $table->text('us_description');
            $table->timestamps();
            $table->softDeletes();

        });

//        School Levels
        Schema::create('school_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

//        School Districts
        Schema::create('school_districts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        School or institution types
        Schema::create('school_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//       School Or institutions
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_type_id')->constrained();
            $table->foreignId('school_level_id')->constrained();
            $table->foreignId('school_district_id')->nullable()->constrained();
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });
//        Subject or Courses
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('education_level_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['name', 'education_level_id'], 'subject_education_level');
        });

//       Serviceperson Education
        Schema::create('serviceperson_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('education_level_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('education_grade_id')->constrained();
            $table->foreignId('school_id')->constrained();
            $table->date('completed_on');
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
        Schema::dropIfExists('serviceperson_education');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('education_levels');
        Schema::dropIfExists('education_grades');
        Schema::dropIfExists('school_districts');
        Schema::dropIfExists('school_levels');
        Schema::dropIfExists('school_types');
        Schema::dropIfExists('schools');
    }
}
