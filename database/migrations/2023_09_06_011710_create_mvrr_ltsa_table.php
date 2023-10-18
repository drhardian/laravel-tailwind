<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mvrr_ltsa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repair_report_id');
            $table->text('ltsa_title')->nullable();
            $table->text('ltsa_ref')->nullable();
            $table->text('ro_number')->nullable();
            $table->date('ro_date')->nullable();
            $table->text('ex_station_p_f')->nullable();
            $table->text('ltsa_project')->nullable();
            $table->text('ltsa_manager')->nullable();
            $table->text('workshop_lead')->nullable();
            $table->text('engineering_lead')->nullable();
            $table->text('qc_inspector')->nullable();
            $table->text('painting_operator')->nullable();
            $table->text('ndt_level')->nullable();
            $table->text('other_ptcs_personel')->nullable();
            $table->text('qc_representative')->nullable();
            $table->text('other_customer_personel')->nullable();
            $table
                ->foreign('repair_report_id')
                ->references('id')
                ->on('mvrr_repair_reports');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mvrr_ltsa');
    }
};
