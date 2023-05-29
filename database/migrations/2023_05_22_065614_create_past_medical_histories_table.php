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
        Schema::create('past_medical_histories', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('medical_exam_id')->unsigned();
            $table->string('allergies')->default('No');
            $table->string('skin_disease')->default('No');
            $table->string('opthalmologic_disorder')->default('No');
            $table->string('ent_disorder')->default('No');
            $table->string('bronchial_asthma')->default('No');
            $table->string('cardiac_disorder')->default('No');
            $table->string('diabetes_melilitus')->default('No');
            $table->string('chronic_headache_or_migraine')->default('No');
            $table->string('hepatitis')->default('No');
            $table->string('hypertension')->default('No');
            $table->string('thyroid_disorder')->default('No');
            $table->string('blood_disorder')->default('No');
            $table->string('tuberculosis')->default('No');
            $table->string('peptic_ulcer')->default('No');
            $table->string('musculoskeletal_disorder')->default('No');
            $table->string('infectious_disease')->default('No');
            $table->text('others')->nullable();
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
        Schema::dropIfExists('past_medical_histories');
    }
};
