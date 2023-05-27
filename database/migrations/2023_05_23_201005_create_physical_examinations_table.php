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
            $table->integer('bmi');

            //major table
            $table->string('general_appearance');
            $table->string('skin1');
            $table->string('head_and_scalp');
            $table->string('eyes');
            $table->string('corrected');
            $table->string('pupils');
            $table->string('ear_eardrums');
            $table->string('nose_sinuses');
            $table->string('mouth_throat');
            $table->string('neck_thyroid');
            $table->string('chest_breast_axilla');
            $table->string('heart_cardiovascular');
            $table->string('lungs_respiratory');
            $table->string('abdomen');
            $table->string('back_flanks');
            $table->string('anus_rectum');
            $table->string('genito_urinary_system');
            $table->string('inguinal_genitals');
            $table->string('musculo_skeletal1');
            $table->string('extremities');
            $table->string('reflexes');
            $table->string('neurological');
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
