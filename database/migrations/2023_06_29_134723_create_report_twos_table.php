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
        Schema::create('report_twos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('report_id')->unsigned();

            //Musculo skeletal
            $table->integer('musculo_skeletal_count')->default(0);
            $table->integer('ligament_sprain_count')->default(0);
            $table->integer('muscle_strain_count')->default(0);
            $table->integer('costrochondritis_count')->default(0);
            $table->integer('soft_tissue_contusion_count')->default(0);
            $table->integer('fracture_count')->default(0);
            $table->integer('gouty_arthritis_count')->default(0);
            $table->integer('plantar_fasciitis_count')->default(0);
            $table->integer('dislocation_count')->default(0);

            //Opthalmology
            $table->integer('opthalmology_count')->default(0);
            $table->integer('conjunctivitis_count')->default(0);
            $table->integer('stye_count')->default(0);
            $table->integer('foreign_body_count')->default(0);

            //ENT
            $table->integer('ent_count')->default(0);
            $table->integer('stomatitis_count')->default(0);
            $table->integer('epistaxis_count')->default(0);
            $table->integer('otitis_media_count')->default(0);
            $table->integer('foreign_body_removal_count')->default(0);
            
            //Neurology
            $table->integer('neurology_count')->default(0);
            $table->integer('tension_headache_count')->default(0);
            $table->integer('migraine_count')->default(0);
            $table->integer('vertigo_count')->default(0);
            $table->integer('hyperventilation_syndrome_count')->default(0);
            $table->integer('insomnia_count')->default(0);
            $table->integer('seizure_count')->default(0);
            $table->integer('bell_palsy_count')->default(0);

            //Dermatology
            $table->integer('dermatology_count')->default(0);
            $table->integer('folliculitis_count')->default(0);
            $table->integer('carbuncle_count')->default(0);
            $table->integer('burn_count')->default(0);
            $table->integer('wound_dressing_count')->default(0);
            $table->integer('infected_wound_count')->default(0);
            $table->integer('blister_wound_count')->default(0);
            $table->integer('seborrheic_dermatitis_count')->default(0);
            $table->integer('bruise_count')->default(0);

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
        Schema::dropIfExists('report_twos');
    }
};
