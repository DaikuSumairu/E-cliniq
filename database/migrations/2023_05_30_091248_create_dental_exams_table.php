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
        Schema::create('dental_exams', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('record_id')->unsigned();
            $table->date('date_created');
            $table->date('date_updated')->nullable();
            $table->timestamps();

            //Foreign keys
            $table->foreign('record_id')->references('id')->on('records')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dental_exams');
    }
};
