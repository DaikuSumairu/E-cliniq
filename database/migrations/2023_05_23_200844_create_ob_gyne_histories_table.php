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
        Schema::create('ob_gyne_histories', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('medical_exam_id')->unsigned();
            $table->string('lnmp')->default('No');
            $table->string('ob_score')->default('No');
            $table->string('abnormal_pregnancies')->default('No');
            $table->string('date_of_last_delivery')->default('No');
            $table->string('breast_uterus_ovaries')->default('No');
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
        Schema::dropIfExists('ob_gyne_histories');
    }
};
