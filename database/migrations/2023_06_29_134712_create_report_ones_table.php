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
        Schema::create('report_ones', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('report_id')->unsigned();

            //Visit for meds
            $table->integer('meds_count')->default(0);

            //Cardiology
            $table->integer('cardiology_count')->default(0);
            $table->integer('hypertension_count')->default(0);
            $table->integer('bp_monitoring_count')->default(0);
            $table->integer('bradycardia_count')->default(0);
            $table->integer('hypotension_count')->default(0);

            //Pulmonology
            $table->integer('pulmonology_count')->default(0);
            $table->integer('urti_count')->default(0);
            $table->integer('pneumonia_count')->default(0);
            $table->integer('ptb_count')->default(0);
            $table->integer('bronchitis_count')->default(0);
            $table->integer('lung_pathology_count')->default(0);
            $table->integer('acute_bronchitis_count')->default(0);

            //Gastroenterology
            $table->integer('gastroenterology_count')->default(0);
            $table->integer('acute_gastroenteritis_count')->default(0);
            $table->integer('gerd_count')->default(0);
            $table->integer('hemorrhoids_count')->default(0);
            $table->integer('anorexia_count')->default(0);

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
        Schema::dropIfExists('report_ones');
    }
};
