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
        Schema::create('reportstwo', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('report_id')->unsigned();

            //Musculo skeletal
            $table->integer('musculo_skeletal')->default(0);
            $table->integer('ligament_sprain')->default(0);
            $table->integer('muscle_strain')->default(0);
            $table->integer('costrochondritis')->default(0);
            $table->integer('soft_tissue_contusion')->default(0);
            $table->integer('fracture')->default(0);
            $table->integer('gouty_arthritis')->default(0);
            $table->integer('plantar_fasciitis')->default(0);
            $table->integer('dislocation')->default(0);

            //Opthalmology
            $table->integer('opthalmology')->default(0);
            $table->integer('conjunctivitis')->default(0);
            $table->integer('stye')->default(0);
            $table->integer('foreign_body')->default(0);

            //ENT
            $table->integer('ent')->default(0);
            $table->integer('stomatitis')->default(0);
            $table->integer('epistaxis')->default(0);
            $table->integer('otitis_media')->default(0);
            $table->integer('foreign_body_removal')->default(0);
            
            //Neurology
            $table->integer('neurology')->default(0);
            $table->integer('tension_headache')->default(0);
            $table->integer('migraine')->default(0);
            $table->integer('vertigo')->default(0);
            $table->integer('hyperventilation_syndrome')->default(0);
            $table->integer('insomnia')->default(0);
            $table->integer('seizure')->default(0);
            $table->integer('bell_palsy')->default(0);

            //Dermatology
            $table->integer('dermatology')->default(0);
            $table->integer('folliculitis')->default(0);
            $table->integer('carbuncle')->default(0);
            $table->integer('burn')->default(0);
            $table->integer('wound_dressing')->default(0);
            $table->integer('infected_wound')->default(0);
            $table->integer('blister_wound')->default(0);
            $table->integer('seborrheic_dermatitis')->default(0);
            $table->integer('bruise')->default(0);

            $table->timestamps();

            //Foreign keys
            $table->foreign('report_id')->references('id')->on('reports')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportstwo');
    }
};
