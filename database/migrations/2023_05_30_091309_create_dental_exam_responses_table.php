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
        Schema::create('dental_exam_responses', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('dental_exam_id')->unsigned();
            $table->string('oral_hygiene');
            $table->string('gingival_color');
            $table->string('consistency_of_the_gingival');
            $table->string('oral_prophylaxis');
            $table->string('restoration');
            $table->string('extraction');
            $table->string('prosthodontic_restoration');
            $table->string('orthodontist');
            $table->timestamps();

            //Foreign keys
            $table->foreign('dental_exam_id')->references('id')->on('dental_exams')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dental_exam_responses');
    }
};
