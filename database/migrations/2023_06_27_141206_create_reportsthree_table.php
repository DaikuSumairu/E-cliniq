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
        Schema::create('reportsthree', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('report_id')->unsigned();
            
            //Nephrology
            $table->integer('nephrology')->default(0);
            $table->integer('urinary_tract_infection')->default(0);
            $table->integer('renal_disease')->default(0);
            $table->integer('urolithiasis')->default(0);

            //Endocrinology
            $table->integer('endocrinology')->default(0);
            $table->integer('hypoglycemia')->default(0);
            $table->integer('dyslipidemia')->default(0);
            $table->integer('diabetes_mellitus')->default(0);

            //OB-Gyne
            $table->integer('ob_gyne')->default(0);
            $table->integer('dysmenorrhea')->default(0);
            $table->integer('hormonal_imbalance')->default(0);
            $table->integer('pregnancy')->default(0);

            //Hematologic
            $table->integer('hematologic')->default(0);
            $table->integer('leukemia')->default(0);
            $table->integer('blood_dyscrasia')->default(0);
            $table->integer('anemia')->default(0);

            //Surgery
            $table->integer('surgery')->default(0);
            $table->integer('lacerated_wound')->default(0);
            $table->integer('punctured_wound')->default(0);
            $table->integer('animal_bite')->default(0);
            $table->integer('superfacial_abrasions')->default(0);
            $table->integer('foreign_body_removal1')->default(0);

            //Allergology
            $table->integer('allergology')->default(0);
            $table->integer('contact_dermatitis')->default(0);
            $table->integer('allergic_rhinitis')->default(0);
            $table->integer('bronchial_asthma')->default(0);
            $table->integer('hypersensitivity')->default(0);

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
        Schema::dropIfExists('reportsthree');
    }
};
