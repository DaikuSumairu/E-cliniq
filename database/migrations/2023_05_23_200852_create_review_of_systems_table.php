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
            $table->string('skin')->default('No');
            $table->string('opthalmologic')->default('No');
            $table->string('ent')->default('No');
            $table->string('cardiovascular')->default('No');
            $table->string('respiratory')->default('No');
            $table->string('gastro_intestinal')->default('No');
            $table->string('neuro_psychiatric')->default('No');
            $table->string('hematology')->default('No');
            $table->string('genitourinary')->default('No');
            $table->string('musculo_skeletal')->default('No');
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
