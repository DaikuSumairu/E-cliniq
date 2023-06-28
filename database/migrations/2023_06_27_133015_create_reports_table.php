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
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('visitone_id')->unsigned();
            $table->integer('visittwo_id')->unsigned();
            $table->integer('visitthree_id')->unsigned();
            $table->timestamps();

            //Foreign keys
            $table->foreign('visitone_id')->references('id')->on('visitsone')
                ->onDelete('cascade');
            $table->foreign('visittwo_id')->references('id')->on('visitstwo')
                ->onDelete('cascade');
            $table->foreign('visitthree_id')->references('id')->on('visitsthree')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
