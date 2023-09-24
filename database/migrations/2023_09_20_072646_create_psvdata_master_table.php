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
        Schema::create('psvdata_master', function (Blueprint $table) {
            $table->id();
            // GENERAL INFORMATION
            $table->text('area')->nullable();
            $table->string('flow')->nullable();
            $table->string('platform')->nullable();
            $table->string('tag_number')->nullable();
            $table->text('operational')->nullable();
            $table->text('integrity')->nullable();
            $table->date('cert_date')->nullable();
            $table->string('cert_doc')->nullable();
            $table->date('exp_date')->nullable();
            $table->string('valve_number')->nullable();
            $table->string('status')->nullable();
            $table->string('deferal')->nullable();
            $table->string('resetting')->nullable();
            $table->string('resize')->nullable();
            $table->string('demolish')->nullable();
            $table->string('relief')->nullable();
            $table->string('note')->nullable();
            $table->string('cert_package')->nullable();
            $table->string('klarifikasi')->nullable();
            $table->string('by')->nullable();
            // VALVE INFORMATION
            $table->string('manufacture')->nullable();
            $table->string('model_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('size_in')->nullable();
            $table->string('rating_in')->nullable();
            $table->string('condi_in')->nullable();
            $table->string('size_out')->nullable();
            $table->string('rating_out')->nullable();
            $table->string('condi_out')->nullable();
            $table->string('press')->nullable();
            $table->string('vacuum')->nullable();
            $table->string('psv')->nullable();
            $table->string('design')->nullable();
            $table->string('selection')->nullable();
            $table->string('psv_capacity')->nullable();
            $table->string('psv_capacityunit')->nullable();
            $table->string('bonnet')->nullable();
            $table->string('seat')->nullable();
            $table->text('CAP')->nullable();
            $table->string('body_bonnet')->nullable();
            $table->string('disc_material')->nullable();
            $table->string('spring_material')->nullable();
            $table->string('guide_material')->nullable();
            $table->string('resilient_seat')->nullable();
            $table->string('bellow_material')->nullable();
            $table->date('year_build')->nullable();
            $table->date('year_install')->nullable();
            // PROCESS CONDITION
            $table->string('service')->nullable();
            $table->string('equip_number')->nullable();
            $table->string('pid')->nullable();
            $table->string('size_basic')->nullable();
            $table->string('size_code')->nullable();
            $table->string('fluid')->nullable();
            $table->string('required')->nullable();
            $table->string('capacity_unit')->nullable();
            $table->string('mawp')->nullable();
            $table->string('operating_psi')->nullable();
            $table->string('back_psi')->nullable();
            $table->string('operating_temp')->nullable();
            $table->string('cold_diff')->nullable();
            $table->string('allowable')->nullable();
            // CONDITION REPLACEMENT
            $table->string('shutdown')->nullable();
            $table->string('valve_upstream')->nullable();
            $table->string('condi_upstream')->nullable();
            $table->string('valve_downstream')->nullable();
            $table->string('condi_downstream')->nullable();
            $table->string('scaffolding')->nullable();
            $table->string('spacer_inlet')->nullable();
            $table->string('spacer_outlet')->nullable();
            //END CONDI REPLACE
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psvdata_master');
    }
};