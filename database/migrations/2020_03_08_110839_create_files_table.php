<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        files categories
        Schema::create('file_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//        files subcategories
        Schema::create('file_subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('file_category_id')->constrained();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//        files sub subcategories
        Schema::create('file_sub_subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->foreignId('file_subcategory_id')->constrained();
            $table->string('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

//        Files
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->foreignId('file_category_id')->constrained('file_categories');
            $table->foreignId('file_subcategory_id')->constrained('file_subcategories');
            $table->foreignId('file_sub_subcategory_id')->constrained('file_sub_subcategories');
            $table->string('description')->nullable();
            $table->timestamps();
        });

//        fileables
        Schema::create('fileables', function (Blueprint $table) {
            $table->bigInteger('file_id')->unsigned();
            $table->bigInteger('fileable_id')->unsigned();
            $table->string('fileable_type');
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
        Schema::dropIfExists('files');
        Schema::dropIfExists('fileables');
        Schema::dropIfExists('file_sub_subcategories');
        Schema::dropIfExists('file_subcategories');
        Schema::dropIfExists('file_categories');

    }
}
