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
            $table->string('bronchial_asthma_1');
            $table->string('diabetes_melilitus_1');
            $table->string('thyroid_disorder_1');
            $table->string('opthalmologic_disease');
            $table->string('cancer');
            $table->string('cardiac_disorder_1');
            $table->string('hypertension_1');
            $table->string('tuberculosis_1');
            $table->string('nervous_disorder');
            $table->string('musculoskeletal');
            $table->string('liver_disease');
            $table->string('kidney_disease');
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
