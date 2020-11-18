<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnlistmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Enlistment Types
        Schema::create('enlistment_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

//        Engagement periods lookup
        Schema::create('engagement_periods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('slug');
            $table->timestamps();
            $table->softDeletes();
        });

//        Re-engagement periods lookup
        Schema::create('re_engagement_periods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('slug');
            $table->timestamps();
            $table->softDeletes();
        });

//        Serviceperson Enlistment
        Schema::create('enlistments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('enlistment_type_id')->constrained();
            $table->date('date');
            $table->foreignId('engagement_period_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
//          unique Key
            $table->unique(['serviceperson_number', 'enlistment_type_id'], 'serviceperson_enlistment');
        });

//        Serviceperson Re-engagement
        Schema::create('re_engagements', function (Blueprint $table) {
            $table->id();
            //request
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('re_engagement_period_id')->constrained();
            $table->date('requested_on');

            //Medical Reference
            $table->foreignId('medical_classification_id')->nullable()->constrained();

            // Recommendation
            $table->foreignId('recommendation_status_id')->nullable()->constrained();;
            $table->foreignId('recommended_by')->nullable()->constrained('servicepeople', 'number');
            $table->date('recommended_on')->nullable();
            $table->text('recommendation_particulars')->nullable();

            //Approval
            $table->foreignId('approval_status_id')->nullable()->constrained();
            $table->foreignId('approved_by')->nullable()->constrained('servicepeople', 'number');
            $table->date('approved_on')->nullable();
            $table->text('approval_particulars')->nullable();
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
        Schema::dropIfExists('enlistment_types');
        Schema::dropIfExists('engagement_periods');
        Schema::dropIfExists('re_engagement_periods');
        Schema::dropIfExists('enlistments');
        Schema::dropIfExists('re_engagements');
    }
}
