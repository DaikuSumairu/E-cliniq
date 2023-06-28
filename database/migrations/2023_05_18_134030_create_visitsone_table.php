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
        Schema::create('visitsone', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('visit_id')->unsigned();

            //Visit for meds
            $table->string('meds')->default('No');

            //Cardiology
            $table->string('cardiology')->default('No');
            $table->string('hypertension')->default('No');
            $table->string('bp_monitoring')->default('No');
            $table->string('bradycardia')->default('No');
            $table->string('hypotension')->default('No');

            //Pulmonology
            $table->string('pulmonology')->default('No');
            $table->string('urti')->default('No');
            $table->string('pneumonia')->default('No');
            $table->string('ptb')->default('No');
            $table->string('bronchitis')->default('No');
            $table->string('lung_pathology')->default('No');
            $table->string('acute_bronchitis')->default('No');

            //Gastroenterology
            $table->string('gastroenterology')->default('No');
            $table->string('acute_gastroenteritis')->default('No');
            $table->string('gerd')->default('No');
            $table->string('hemorrhoids')->default('No');
            $table->string('anorexia')->default('No');

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
        Schema::dropIfExists('visitsone');
    }
};
