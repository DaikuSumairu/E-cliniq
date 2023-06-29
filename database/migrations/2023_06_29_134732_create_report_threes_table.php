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
        Schema::create('report_threes', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('report_id')->unsigned();
            
            //Nephrology
            $table->integer('nephrology_count')->default(0);
            $table->integer('urinary_tract_infection_count')->default(0);
            $table->integer('renal_disease_count')->default(0);
            $table->integer('urolithiasis_count')->default(0);

            //Endocrinology
            $table->integer('endocrinology_count')->default(0);
            $table->integer('hypoglycemia_count')->default(0);
            $table->integer('dyslipidemia_count')->default(0);
            $table->integer('diabetes_mellitus_count')->default(0);

            //OB-Gyne
            $table->integer('ob_gyne_count')->default(0);
            $table->integer('dysmenorrhea_count')->default(0);
            $table->integer('hormonal_imbalance_count')->default(0);
            $table->integer('pregnancy_count')->default(0);

            //Hematologic
            $table->integer('hematologic_count')->default(0);
            $table->integer('leukemia_count')->default(0);
            $table->integer('blood_dyscrasia_count')->default(0);
            $table->integer('anemia_count')->default(0);

            //Surgery
            $table->integer('surgery_count')->default(0);
            $table->integer('lacerated_wound_count')->default(0);
            $table->integer('punctured_wound_count')->default(0);
            $table->integer('animal_bite_count')->default(0);
            $table->integer('superfacial_abrasions_count')->default(0);
            $table->integer('foreign_body_removal1_count')->default(0);

            //Allergology
            $table->integer('allergology_count')->default(0);
            $table->integer('contact_dermatitis_count')->default(0);
            $table->integer('allergic_rhinitis_count')->default(0);
            $table->integer('bronchial_asthma_count')->default(0);
            $table->integer('hypersensitivity_count')->default(0);

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
        Schema::dropIfExists('report_threes');
    }
};
