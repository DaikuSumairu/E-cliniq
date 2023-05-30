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
        Schema::create('dental_exam_restorations', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('dental_exam_response_id')->unsigned();
            $table->string('restoration_lt1')->nullable();
            $table->string('restoration_lt2')->nullable();
            $table->string('restoration_lt3')->nullable();
            $table->string('restoration_lt4')->nullable();
            $table->string('restoration_lt5')->nullable();
            $table->string('restoration_lt6')->nullable();
            $table->string('restoration_lt7')->nullable();
            $table->string('restoration_lt8')->nullable();
            $table->string('restoration_lb1')->nullable();
            $table->string('restoration_lb2')->nullable();
            $table->string('restoration_lb3')->nullable();
            $table->string('restoration_lb4')->nullable();
            $table->string('restoration_lb5')->nullable();
            $table->string('restoration_lb6')->nullable();
            $table->string('restoration_lb7')->nullable();
            $table->string('restoration_lb8')->nullable();
            $table->string('restoration_rt1')->nullable();
            $table->string('restoration_rt2')->nullable();
            $table->string('restoration_rt3')->nullable();
            $table->string('restoration_rt4')->nullable();
            $table->string('restoration_rt5')->nullable();
            $table->string('restoration_rt6')->nullable();
            $table->string('restoration_rt7')->nullable();
            $table->string('restoration_rt8')->nullable();
            $table->string('restoration_rb1')->nullable();
            $table->string('restoration_rb2')->nullable();
            $table->string('restoration_rb3')->nullable();
            $table->string('restoration_rb4')->nullable();
            $table->string('restoration_rb5')->nullable();
            $table->string('restoration_rb6')->nullable();
            $table->string('restoration_rb7')->nullable();
            $table->string('restoration_rb8')->nullable();
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
        Schema::dropIfExists('dental_exam_restorations');
    }
};
