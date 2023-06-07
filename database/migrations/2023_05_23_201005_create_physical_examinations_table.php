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
        Schema::create('physical_examinations', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('medical_exam_id')->unsigned();
            $table->integer('height');
            $table->integer('weight');
            $table->integer('bp1');
            $table->integer('bp2');
            $table->integer('cardiac_rate');
            $table->integer('respiratory_rate');
            $table->float('bmi');

            //major table
            $table->string('general_appearance')->default('No');
            $table->string('skin1')->default('No');
            $table->string('head_and_scalp')->default('No');
            $table->string('eyes')->default('No');
            $table->string('corrected')->default('No');
            $table->string('pupils')->default('No');
            $table->string('ear_eardrums')->default('No');
            $table->string('nose_sinuses')->default('No');
            $table->string('mouth_throat')->default('No');
            $table->string('neck_thyroid')->default('No');
            $table->string('chest_breast_axilla')->default('No');
            $table->string('heart_cardiovascular')->default('No');
            $table->string('lungs_respiratory')->default('No');
            $table->string('abdomen')->default('No');
            $table->string('back_flanks')->default('No');
            $table->string('anus_rectum')->default('No');
            $table->string('genito_urinary_system')->default('No');
            $table->string('inguinal_genitals')->default('No');
            $table->string('musculo_skeletal1')->default('No');
            $table->string('extremities')->default('No');
            $table->string('reflexes')->default('No');
            $table->string('neurological')->default('No');
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
        Schema::dropIfExists('physical_examinations');
    }
};
