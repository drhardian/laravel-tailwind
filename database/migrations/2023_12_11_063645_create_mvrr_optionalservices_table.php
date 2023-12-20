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
        Schema::create('mvrr_optionalservices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repair_report_id');
            $table->foreign('repair_report_id')->references('id')->on('mvrr_repair_reports');
            $table->unsignedBigInteger('scope_of_work_id');

            $table->boolean('valvepretest_checkbox')->nullable();
            $table->string('vp_test_technician')->nullable();
            $table->string('vp_test_date')->nullable();
            $table->string('vp_test_witnessed_by')->nullable();

            $table->unsignedBigInteger('vp_seak_leak_class')->nullable();
            $table->foreign('vp_seak_leak_class')->references('id')->on('mvrr_optionalservices')->name('vpseakleakclassfk');
            $table->unsignedBigInteger('vp_seat_test_pressure')->nullable();
            $table->foreign('vp_seat_test_pressure')->references('id')->on('mvrr_optionalservices')->name('vpseattestpressurefk');
            $table->unsignedBigInteger('vp_seat_test_pressure_uom')->nullable();
            $table->foreign('vp_seat_test_pressure_uom')->references('id')->on('mvrr_optionalservices')->name('vpseattestpressureuomfk');

            $table->unsignedBigInteger('vp_pressure_class')->nullable();
            $table->foreign('vp_pressure_class')->references('id')->on('mvrr_optionalservices')->name('vppressureclassfk');

            $table->string('vp_hydro_test_pressure')->nullable();


            $table->unsignedBigInteger('vp_hydro_test_pressure_uom')->nullable();
            $table->foreign('vp_hydro_test_pressure_uom')->references('id')->on('mvrr_optionalservices')->name('vphydrotestpressureuomfk');


            $table->unsignedBigInteger('vp_hydro_test_duration')->nullable();
            $table->foreign('vp_hydro_test_duration')->references('id')->on('mvrr_optionalservices')->name('vphydrotestdurationfk');



            $table->string('vp_allowable_leakage')->nullable();

            $table->unsignedBigInteger('vp_allowable_leakage_uom')->nullable();
            $table->foreign('vp_allowable_leakage_uom')->references('id')->on('mvrr_optionalservices')->name('vpallowableleakageuomfk');


            $table->string('vp_actual_leakage')->nullable();

            $table->unsignedBigInteger('vp_actual_leakage_uom')->nullable();
            $table->foreign('vp_actual_leakage_uom')->references('id')->on('mvrr_optionalservices')->name('vpactualleakageuomfk');

            $table->tinyText('vp_bc_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mvrr_optionalservices');
    }
};
