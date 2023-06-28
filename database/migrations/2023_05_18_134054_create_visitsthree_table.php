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
        Schema::create('visitsthree', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('visit_id')->unsigned();
            
            //Nephrology
            $table->string('nephrology')->default('No');
            $table->string('urinary_tract_infection')->default('No');
            $table->string('renal_disease')->default('No');
            $table->string('urolithiasis')->default('No');

            //Endocrinology
            $table->string('endocrinology')->default('No');
            $table->string('hypoglycemia')->default('No');
            $table->string('dyslipidemia')->default('No');
            $table->string('diabetes_mellitus')->default('No');

            //OB-Gyne
            $table->string('ob_gyne')->default('No');
            $table->string('dysmenorrhea')->default('No');
            $table->string('hormonal_imbalance')->default('No');
            $table->string('pregnancy')->default('No');

            //Hematologic
            $table->string('hematologic')->default('No');
            $table->string('leukemia')->default('No');
            $table->string('blood_dyscrasia')->default('No');
            $table->string('anemia')->default('No');

            //Surgery
            $table->string('surgery')->default('No');
            $table->string('lacerated_wound')->default('No');
            $table->string('punctured_wound')->default('No');
            $table->string('animal_bite')->default('No');
            $table->string('superfacial_abrasions')->default('No');
            $table->string('foreign_body_removal1')->default('No');

            //Allergology
            $table->string('allergology')->default('No');
            $table->string('contact_dermatitis')->default('No');
            $table->string('allergic_rhinitis')->default('No');
            $table->string('bronchial_asthma')->default('No');
            $table->string('hypersensitivity')->default('No');

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
        Schema::dropIfExists('visitsthree');
    }
};
