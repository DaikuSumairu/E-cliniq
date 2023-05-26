<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_and_social_histories', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('medical_exam_id')->unsigned();
            $table->string('smoker')->default('No');
            $table->integer('stick')->nullable();
            $table->integer('pack')->nullable();
            $table->string('alcoholic')->default('No');
            $table->integer('frequent')->nullable();
            $table->integer('week')->nullable();
            $table->string('medication')->default('No');
            $table->text('take')->nullable();

            //Hospitalization
            $table->string('hospitalization')->default('No');
            $table->integer('hosp_times')->nullable();

            //Operation
            $table->string('operation')->default('No');
            $table->integer('op_times')->nullable();
            $table->timestamps();

            //Foreign keys
            $table->foreign('medical_exam_id')->references('id')->on('medical_exams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_and_social_histories');
    }
};
