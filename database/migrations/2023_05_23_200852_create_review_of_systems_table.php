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
        Schema::create('review_of_systems', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('medical_exam_id')->unsigned();
            $table->string('skin');
            $table->string('opthalmologic');
            $table->string('ent');
            $table->string('cardiovascular');
            $table->string('respiratory');
            $table->string('gastro_intestinal');
            $table->string('neuro_psychiatric');
            $table->string('hematology');
            $table->string('genitourinary');
            $table->string('musculo_skeletal');
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
        Schema::dropIfExists('review_of_systems');
    }
};
