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
            $table->string('allergies');
            $table->string('skin_disease');
            $table->string('opthalmologic_disorder');
            $table->string('ent_disorder');
            $table->string('bronchial_asthma');
            $table->string('cardiac_disorder');
            $table->string('diabetes_melilitus');
            $table->string('chronic_headache_or_migraine');
            $table->string('hepatitis');
            $table->string('hypertension');
            $table->string('thyroid_disorder');
            $table->string('blood_disorder');
            $table->string('tuberculosis');
            $table->string('peptic_ulcer');
            $table->string('musculoskeletal_disorder');
            $table->string('infectious_disease');
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
