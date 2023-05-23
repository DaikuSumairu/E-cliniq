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
        Schema::create('family_history_positives', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('family_history_id')->unsigned();
            $table->text('1_positive')->nullable();
            $table->text('2_positive')->nullable();
            $table->text('3_positive')->nullable();
            $table->text('4_positive')->nullable();
            $table->text('5_positive')->nullable();
            $table->text('6_positive')->nullable();
            $table->text('7_positive')->nullable();
            $table->text('8_positive')->nullable();
            $table->text('9_positive')->nullable();
            $table->text('10_positive')->nullable();
            $table->text('11_positive')->nullable();
            $table->text('12_positive')->nullable();
            $table->timestamps();

            //Foreign keys
            $table->foreign('family_history_id')->references('id')->on('family_histories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_history_positives');
    }
};
