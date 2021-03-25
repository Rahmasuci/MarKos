<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_houses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['putra', 'putri']);
            $table->string('address');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('owner');
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path_img');
            $table->unsignedBigInteger('boarding_house_id');
            $table->foreign('boarding_house_id')->references('id')->on('boarding_houses')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('criterias', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 10,0);
            $table->string('distance');
            $table->string('large');            
            $table->unsignedBigInteger('boarding_house_id');
            $table->foreign('boarding_house_id')->references('id')->on('boarding_houses')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('facility');
            $table->timestamps();
        });

        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->string('condition');
            $table->timestamps();
        });

        Schema::create('facility_criteria', function (Blueprint $table) {
            $table->unsignedBigInteger('facility_id');
            $table->foreign('facility_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->unsignedBigInteger('criteria_id');
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
        });

        Schema::create('condition_criteria', function (Blueprint $table) {
             $table->unsignedBigInteger('condition_id');
            $table->foreign('condition_id')->references('id')->on('conditions')->onDelete('cascade');
            $table->unsignedBigInteger('criteria_id');
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
        Schema::dropIfExists('facility_criteria');
        Schema::dropIfExists('condition_criteria');
        Schema::dropIfExists('facilities');
        Schema::dropIfExists('conditions');
        Schema::dropIfExists('criterias');
        Schema::dropIfExists('boarding_houses');
    }
}
