<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('boarding_house_id');
            $table->foreign('boarding_house_id')->references('id')->on('boarding_houses')->onDelete('cascade');
            $table->string('price_criteria');
            $table->string('distance_criteria');
            $table->string('large_criteria');
            $table->string('facility_criteria');
            $table->string('condition_criteria');
            $table->decimal('result', 10,3);
            $table->tinyInteger('rank');
            $table->string('result_code');
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
        Schema::dropIfExists('result');
    }
}
