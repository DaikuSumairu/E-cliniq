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
        Schema::create('past_medical_history_findings', function (Blueprint $table) {
            $table->id();
            $table->integer('past_medical_history_id')->unsigned();
            $table->text('1_findings')->nullable();
            $table->text('2_findings')->nullable();
            $table->text('3_findings')->nullable();
            $table->text('4_findings')->nullable();
            $table->text('5_findings')->nullable();
            $table->text('6_findings')->nullable();
            $table->text('7_findings')->nullable();
            $table->text('8_findings')->nullable();
            $table->text('9_findings')->nullable();
            $table->text('10_findings')->nullable();
            $table->text('11_findings')->nullable();
            $table->text('12_findings')->nullable();
            $table->text('13_findings')->nullable();
            $table->text('14_findings')->nullable();
            $table->text('15_findings')->nullable();
            $table->text('16_findings')->nullable();
            $table->text('others_findings')->nullable();
            $table->timestamps();

            //Foreign keys
            $table->foreign('past_medical_history_id')->references('id')->on('past_medical_histories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('past_medical_history_findings');
    }
};
