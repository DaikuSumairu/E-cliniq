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
        Schema::create('medical_exam_responses', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('past_medical_history_id')->unsigned();
            $table->integer('family_history_id')->unsigned();
            $table->integer('ob_gyne_history_id')->unsigned();
            $table->integer('review_of_system_id')->unsigned();
            $table->integer('physical_examination_id')->unsigned();

            //Past Medical Response
            $table->text('1_pm_respond')->nullable();
            $table->text('2_pm_respond')->nullable();
            $table->text('3_pm_respond')->nullable();
            $table->text('4_pm_respond')->nullable();
            $table->text('5_pm_respond')->nullable();
            $table->text('6_pm_respond')->nullable();
            $table->text('7_pm_respond')->nullable();
            $table->text('8_pm_respond')->nullable();
            $table->text('9_pm_respond')->nullable();
            $table->text('10_pm_respond')->nullable();
            $table->text('11_pm_respond')->nullable();
            $table->text('12_pm_respond')->nullable();
            $table->text('13_pm_respond')->nullable();
            $table->text('14_pm_respond')->nullable();
            $table->text('15_pm_respond')->nullable();
            $table->text('16_pm_respond')->nullable();
            $table->text('others_pm_respond')->nullable();

            //Family History Response
            $table->text('1_fh_respond')->nullable();
            $table->text('2_fh_respond')->nullable();
            $table->text('3_fh_respond')->nullable();
            $table->text('4_fh_respond')->nullable();
            $table->text('5_fh_respond')->nullable();
            $table->text('6_fh_respond')->nullable();
            $table->text('7_fh_respond')->nullable();
            $table->text('8_fh_respond')->nullable();
            $table->text('9_fh_respond')->nullable();
            $table->text('10_fh_respond')->nullable();
            $table->text('11_fh_respond')->nullable();
            $table->text('12_fh_respond')->nullable();
            $table->text('others_fh_respond')->nullable();

            //OB-GYNE History Response
            $table->text('1_ob_respond')->nullable();
            $table->text('2_ob_respond')->nullable();
            $table->text('3_ob_respond')->nullable();
            $table->text('4_ob_respond')->nullable();
            $table->text('5_ob_respond')->nullable();

            //Review of Systems Response
            $table->text('1_rs_respond')->nullable();
            $table->text('2_rs_respond')->nullable();
            $table->text('3_rs_respond')->nullable();
            $table->text('4_rs_respond')->nullable();
            $table->text('5_rs_respond')->nullable();
            $table->text('6_rs_respond')->nullable();
            $table->text('7_rs_respond')->nullable();
            $table->text('8_rs_respond')->nullable();
            $table->text('9_rs_respond')->nullable();
            $table->text('10_rs_respond')->nullable();

            //Physical Examination Response
            $table->text('1_pe_respond')->nullable();
            $table->text('2_pe_respond')->nullable();
            $table->text('3_pe_respond')->nullable();
            $table->integer('od_pe_respond')->nullable();
            $table->integer('od1_pe_respond')->nullable();
            $table->integer('os_pe_respond')->nullable();
            $table->integer('os1_pe_respond')->nullable();
            $table->integer('od_pe_respond1')->nullable();
            $table->integer('od1_pe_respond1')->nullable();
            $table->integer('os_pe_respond1')->nullable();
            $table->integer('os1_pe_respond1')->nullable();
            $table->text('6_pe_respond')->nullable();
            $table->text('7_pe_respond')->nullable();
            $table->text('8_pe_respond')->nullable();
            $table->text('9_pe_respond')->nullable();
            $table->text('10_pe_respond')->nullable();
            $table->text('11_pe_respond')->nullable();
            $table->text('12_pe_respond')->nullable();
            $table->text('13_pe_respond')->nullable();
            $table->text('14_pe_respond')->nullable();
            $table->text('15_pe_respond')->nullable();
            $table->text('16_pe_respond')->nullable();
            $table->text('17_pe_respond')->nullable();
            $table->text('18_pe_respond')->nullable();
            $table->text('19_pe_respond')->nullable();
            $table->text('20_pe_respond')->nullable();
            $table->text('21_pe_respond')->nullable();
            $table->text('22_pe_respond')->nullable();
            $table->text('diagnosis')->nullable();

            $table->timestamps();

            //Foreign keys
            $table->foreign('past_medical_history_id')->references('id')->on('past_medical_histories')
                ->onDelete('cascade');
            $table->foreign('family_history_id')->references('id')->on('family_histories')
                ->onDelete('cascade');
            $table->foreign('ob_gyne_history_id')->references('id')->on('ob_gyne_histories')
                ->onDelete('cascade');
            $table->foreign('review_of_system_id')->references('id')->on('review_of_systems')
                ->onDelete('cascade');
            $table->foreign('physical_examination_id')->references('id')->on('physical_examinations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_exam_responses');
    }
};
