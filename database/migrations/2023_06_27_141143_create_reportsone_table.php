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
        Schema::create('reportsone', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('report_id')->unsigned();

            //Visit for meds
            $table->integer('meds')->default(0);

            //Cardiology
            $table->integer('cardiology')->default(0);
            $table->integer('hypertension')->default(0);
            $table->integer('bp_monitoring')->default(0);
            $table->integer('bradycardia')->default(0);
            $table->integer('hypotension')->default(0);

            //Pulmonology
            $table->integer('pulmonology')->default(0);
            $table->integer('urti')->default(0);
            $table->integer('pneumonia')->default(0);
            $table->integer('ptb')->default(0);
            $table->integer('bronchitis')->default(0);
            $table->integer('lung_pathology')->default(0);
            $table->integer('acute_bronchitis')->default(0);

            //Gastroenterology
            $table->integer('gastroenterology')->default(0);
            $table->integer('acute_gastroenteritis')->default(0);
            $table->integer('gerd')->default(0);
            $table->integer('hemorrhoids')->default(0);
            $table->integer('anorexia')->default(0);

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
        Schema::dropIfExists('reportsone');
    }
};
