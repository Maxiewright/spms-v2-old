<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToServicepeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicepeople', function (Blueprint $table) {
            $table->foreignId('rank_id')->default(1)->constrained();
            $table->foreignId('unit_id')->nullable()->constrained();
            $table->foreignId('job_id')->nullable()->constrained();
            $table->foreignId('branch_id')->nullable()->constrained();
            $table->foreignId('career_path_id')->nullable()->constrained();
            $table->foreignId('stream_id')->nullable()->constrained();
            $table->date('re_engagement_date')->nullable();
            $table->date('crod')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicepeople', function (Blueprint $table) {
            $table->dropColumn('rank_id');
            $table->dropColumn('unit_id');
            $table->dropColumn('job_id');
            $table->dropColumn('branch_id');
            $table->dropColumn('career_path_id');
            $table->dropColumn('stream_id');
            $table->dropColumn('re_engagement_date');
            $table->dropColumn('crod');
        });
    }
}
