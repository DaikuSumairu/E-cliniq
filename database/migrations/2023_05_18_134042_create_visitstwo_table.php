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
        Schema::create('visitstwo', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('visit_id')->unsigned();

            //Musculo skeletal
            $table->string('musculo_skeletal')->default('No');
            $table->string('ligament_sprain')->default('No');
            $table->string('muscle_strain')->default('No');
            $table->string('costrochondritis')->default('No');
            $table->string('soft_tissue_contusion')->default('No');
            $table->string('fracture')->default('No');
            $table->string('gouty_arthritis')->default('No');
            $table->string('plantar_fasciitis')->default('No');
            $table->string('dislocation')->default('No');

            //Opthalmology
            $table->string('opthalmology')->default('No');
            $table->string('conjunctivitis')->default('No');
            $table->string('stye')->default('No');
            $table->string('foreign_body')->default('No');

            //ENT
            $table->string('ent')->default('No');
            $table->string('stomatitis')->default('No');
            $table->string('epistaxis')->default('No');
            $table->string('otitis_media')->default('No');
            $table->string('foreign_body_removal')->default('No');
            
            //Neurology
            $table->string('neurology')->default('No');
            $table->string('tension_headache')->default('No');
            $table->string('migraine')->default('No');
            $table->string('vertigo')->default('No');
            $table->string('hyperventilation_syndrome')->default('No');
            $table->string('insomnia')->default('No');
            $table->string('seizure')->default('No');
            $table->string('bell_palsy')->default('No');

            //Dermatology
            $table->string('dermatology')->default('No');
            $table->string('folliculitis')->default('No');
            $table->string('carbuncle')->default('No');
            $table->string('burn')->default('No');
            $table->string('wound_dressing')->default('No');
            $table->string('infected_wound')->default('No');
            $table->string('blister_wound')->default('No');
            $table->string('seborrheic_dermatitis')->default('No');
            $table->string('bruise')->default('No');

            $table->timestamps();

            //Foreign keys
            $table->foreign('visit_id')->references('id')->on('visits')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitstwo');
    }
};
