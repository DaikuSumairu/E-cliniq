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
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('user_id')->unsigned();
            $table->date('date_created');
            $table->date('date_updated');
            $table->date('birth_date');
            $table->integer('age');
            $table->string('sex');
            $table->string('civil_status');
            $table->string('address');
            $table->string('mobile_number');
            $table->string('contact_person');
            $table->string('contact_person_number');
            $table->timestamps();

            //Foreign keys
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
