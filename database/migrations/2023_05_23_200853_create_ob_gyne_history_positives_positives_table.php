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
        Schema::create('ob_gyne_history_positives', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('ob_gyne_history_id')->unsigned();
            $table->text('1_positive1')->nullable();
            $table->text('2_positive1')->nullable();
            $table->text('3_positive1')->nullable();
            $table->text('4_positive1')->nullable();
            $table->text('5_positive1')->nullable();
            $table->timestamps();

            //Foreign keys
            $table->foreign('ob_gyne_history_id')->references('id')->on('ob_gyne_histories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ob_gyne_history_positives');
    }
};
