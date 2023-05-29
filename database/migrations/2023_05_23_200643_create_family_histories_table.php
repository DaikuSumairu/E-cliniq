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
        Schema::create('family_histories', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('medical_exam_id')->unsigned();
            $table->string('bronchial_asthma_1')->default('No');
            $table->string('diabetes_melilitus_1')->default('No');
            $table->string('thyroid_disorder_1')->default('No');
            $table->string('opthalmologic_disease')->default('No');
            $table->string('cancer')->default('No');
            $table->string('cardiac_disorder_1')->default('No');
            $table->string('hypertension_1')->default('No');
            $table->string('tuberculosis_1')->default('No');
            $table->string('nervous_disorder')->default('No');
            $table->string('musculoskeletal')->default('No');
            $table->string('liver_disease')->default('No');
            $table->string('kidney_disease')->default('No');
            $table->text('others_1')->nullable();
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
        Schema::dropIfExists('family_histories');
    }
};
