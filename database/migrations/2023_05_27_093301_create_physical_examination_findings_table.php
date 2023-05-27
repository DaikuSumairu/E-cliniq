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
        Schema::create('physical_examination_findings', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('physical_examination_id')->unsigned();
            $table->text('1_findings1')->nullable();
            $table->text('2_findings1')->nullable();
            $table->text('3_findings1')->nullable();
            $table->text('od_findings1')->nullable();
            $table->text('od1_findings1')->nullable();
            $table->text('os_findings1')->nullable();
            $table->text('os1_findings1')->nullable();
            $table->text('od_findings2')->nullable();
            $table->text('od1_findings2')->nullable();
            $table->text('os_findings2')->nullable();
            $table->text('os1_findings2')->nullable();
            $table->text('6_findings1')->nullable();
            $table->text('7_findings1')->nullable();
            $table->text('8_findings1')->nullable();
            $table->text('9_findings1')->nullable();
            $table->text('10_findings1')->nullable();
            $table->text('11_findings1')->nullable();
            $table->text('12_findings1')->nullable();
            $table->text('13_findings1')->nullable();
            $table->text('14_findings1')->nullable();
            $table->text('15_findings1')->nullable();
            $table->text('16_findings1')->nullable();
            $table->text('17_findings1')->nullable();
            $table->text('18_findings1')->nullable();
            $table->text('19_findings1')->nullable();
            $table->text('20_findings1')->nullable();
            $table->text('21_findings1')->nullable();
            $table->text('22_findings1')->nullable();
            $table->text('daignosis')->nullable();
            $table->timestamps();

            //Foreign keys
            $table->foreign('physical_examination_id')->references('id')->on('physical_examinations')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_examination_findings');
    }
};
