<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Leave types
        Schema::create('leave_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->boolean('can_be_requested')->default(0);
            $table->boolean('can_be_assigned')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        //Leave Statuses
        Schema::create('leave_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('leave_type_id')->constrained();
            $table->date('start_on');
            $table->date('end_on');
            $table->foreignId('leave_status_id')->constrained();
            $table->foreignId('created_by')->constrained('servicepeople', 'number');
            $table->foreignId('approved_by')->nullable()->constrained('servicepeople', 'number');
            $table->dateTime('approved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Leave Groups
        Schema::create('leave_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Leave Group Entitlement
        Schema::create('leave_group_entitlements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_type_id')->constrained();
            $table->foreignId('leave_group_id')->constrained();
            $table->smallInteger('days_entitled');
            $table->boolean('can_accrue')->default(0);
            $table->smallInteger('max_accrued_days')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        //Leave Entitlement
        Schema::create('leave_entitlements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->foreignId('leave_group_entitlement_id')->constrained();
            $table->year('year');
            $table->smallInteger('days_due')->default(0);
            $table->timestamps();
            $table->softDeletes();

            // composite(unique) key to ensure serviceperson has on one type on leave entitlement in a given year
            $table->unique(['serviceperson_number', 'leave_group_entitlement_id', 'year'], 'yearly_entitlement');
        });

        // Leave Taken
        Schema::create('leave_taken', function (Blueprint $table) {
            $table->foreignId('leave_id')->constrained();
            $table->foreignId('leave_entitlement_id')->constrained();
            $table->smallInteger('days_taken')->unsigned();

            $table->primary(['leave_id', 'leave_entitlement_id'], 'leave_taken_primary');
        });

        // Leave Adjustments Reasons
        Schema::create('leave_adjustment_reasons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Leave Adjustments
        Schema::create('leave_adjustments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leave_id')->constrained();
            $table->foreignId('leave_adjustment_reason_id')->constrained();
            $table->date('ended_on');
            $table->foreignId('adjusted_by')->constrained('servicepeople', 'number');
            $table->timestamps();
            $table->softDeletes();
        });

        // Leave Refunded
        Schema::create('leave_refunded', function (Blueprint $table) {
            $table->foreignId('leave_entitlement_id')->constrained();
            $table->foreignId('leave_adjustment_id')->constrained();
            $table->smallInteger('days_refunded');

            $table->primary(['leave_entitlement_id', 'leave_adjustment_id'], 'leave_adjustment_primary');
        });

        // Leave Remarks
        Schema::create('remarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('body');
            $table->foreignId('serviceperson_number')->constrained('servicepeople', 'number');
            $table->bigInteger('leave_remarkable_id')->unsigned();
            $table->string('leave_remarkable_type');
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
        // Leave Adjustment Group
        Schema::dropIfExists('leave_refunded');
        Schema::dropIfExists('leave_adjustment_reasons');
        Schema::dropIfExists('leave_adjustments');
        // Leave Entitlement Group
        Schema::dropIfExists('leave_taken');
        Schema::dropIfExists('leave_entitlements');
        Schema::dropIfExists('leave_group_entitlements');
        Schema::dropIfExists('leave_groups');
        // Leave Group
        Schema::dropIfExists('leaves');
        Schema::dropIfExists('leave_statuses');
        Schema::dropIfExists('leave_types');

        // Leave Comments
        Schema::dropIfExists('leave_remarks');
    }
}
