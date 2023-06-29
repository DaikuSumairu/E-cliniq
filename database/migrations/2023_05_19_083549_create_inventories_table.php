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
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('visitone_id')->nullable()->unsigned();
            $table->string('name');
            $table->string('dosage');
            $table->integer('quantity');
            $table->timestamps();

            //Foreign keys
            $table->foreign('visitone_id')->references('id')->on('visit_ones')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
