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
        Schema::create('consultation_responses', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('consultation_id')->unsigned();
            $table->text('complaint');
            $table->integer('pulse');
            $table->integer('oxygen');
            $table->integer('respiratory_rate');
            $table->integer('bp1');
            $table->integer('bp2');
            $table->float('temperature');
            $table->text('treatment');
            $table->text('remarks');
            $table->timestamps();

            //Foreign keys
            $table->foreign('consultation_id')->references('id')->on('consultations')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_responses');
    }
};
