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
        Schema::create('dental_exam_extractions', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('dental_exam_response_id')->unsigned();
            $table->string('extraction_lt1')->nullable();
            $table->string('extraction_lt2')->nullable();
            $table->string('extraction_lt3')->nullable();
            $table->string('extraction_lt4')->nullable();
            $table->string('extraction_lt5')->nullable();
            $table->string('extraction_lt6')->nullable();
            $table->string('extraction_lt7')->nullable();
            $table->string('extraction_lt8')->nullable();
            $table->string('extraction_lb1')->nullable();
            $table->string('extraction_lb2')->nullable();
            $table->string('extraction_lb3')->nullable();
            $table->string('extraction_lb4')->nullable();
            $table->string('extraction_lb5')->nullable();
            $table->string('extraction_lb6')->nullable();
            $table->string('extraction_lb7')->nullable();
            $table->string('extraction_lb8')->nullable();
            $table->string('extraction_rt1')->nullable();
            $table->string('extraction_rt2')->nullable();
            $table->string('extraction_rt3')->nullable();
            $table->string('extraction_rt4')->nullable();
            $table->string('extraction_rt5')->nullable();
            $table->string('extraction_rt6')->nullable();
            $table->string('extraction_rt7')->nullable();
            $table->string('extraction_rt8')->nullable();
            $table->string('extraction_rb1')->nullable();
            $table->string('extraction_rb2')->nullable();
            $table->string('extraction_rb3')->nullable();
            $table->string('extraction_rb4')->nullable();
            $table->string('extraction_rb5')->nullable();
            $table->string('extraction_rb6')->nullable();
            $table->string('extraction_rb7')->nullable();
            $table->string('extraction_rb8')->nullable();
            $table->timestamps();
            
            //Foreign keys
            $table->foreign('dental_exam_response_id')->references('id')->on('dental_exam_responses')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dental_exam_extractions');
    }
};
