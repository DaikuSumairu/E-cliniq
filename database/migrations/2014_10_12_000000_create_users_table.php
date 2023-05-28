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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            /**
             * Role maker where if role value is 
             * 0 = student
             * 1 = faculty
             * 2 = doctor
             * 3 = dentist
             * 4 = nurse
             * 5 = admin
             * */
            $table->tinyInteger('role');
            $table->string("school_id")->unique()->nullable();
            $table->string("year")->nullable();
            $table->string("grade")->nullable();
            $table->string("course")->nullable();
            $table->string("department")->nullable();
            $table->string("section")->nullable();

            //General Info of each Users
            $table->date('birth_date')->nullable();
            $table->integer('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('contact_person_number')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
