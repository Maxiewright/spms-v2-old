<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalClassificationsTable extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_classification_grades', function (Blueprint $table) {
            $table->id();
            $table->string('degree');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('medical_classifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('physical_capacity')->constrained('medical_classification_grades');
            $table->foreignId('upper_limbs')->constrained('medical_classification_grades');
            $table->foreignId('locomotion')->constrained('medical_classification_grades');
            $table->foreignId('hearing_left')->constrained('medical_classification_grades');
            $table->foreignId('hearing_right')->constrained('medical_classification_grades');
            $table->foreignId('eyesight_left')->constrained('medical_classification_grades');
            $table->foreignId('eyesight_right')->constrained('medical_classification_grades');
            $table->foreignId('mental_capacity')->constrained('medical_classification_grades');
            $table->foreignId('stability')->constrained('medical_classification_grades');
            $table->date('performed_on');
            $table->string('performed_at');
            $table->foreignId('medical_officer')->constrained('servicepeople', 'number');
            $table->text('medical_officer_remarks');
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
        Schema::dropIfExists('medical_classification_grades');
        Schema::dropIfExists('medical_classifications');
    }
}
