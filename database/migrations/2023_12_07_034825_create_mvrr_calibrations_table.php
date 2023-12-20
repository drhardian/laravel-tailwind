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
        Schema::create('mvrr_calibrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repair_report_id');
            $table->foreign('repair_report_id')->references('id')->on('mvrr_repair_reports');
            $table->unsignedBigInteger('scope_of_work_id');
            $table->foreign('scope_of_work_id')->references('id')->on('mvrr_scope_of_work');


            $table->string('calibration_travel_found')->nullable();
            $table->unsignedBigInteger('calibration_travel_uom_found')->nullable();
            $table->foreign('calibration_travel_uom_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_travel_uom_found_fk');


            $table->string('calibration_bench_set_found')->nullable();
            $table->unsignedBigInteger('calibration_bench_set_uom_found')->nullable();
            $table->foreign('calibration_bench_set_uom_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_benchset_uom_found_fk');



            $table->string('calibration_signal_open_found')->nullable();
            $table->unsignedBigInteger('calibration_signal_open_uom_found')->nullable();
            $table->foreign('calibration_signal_open_uom_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_signalopen_uom_found_fk');



            $table->string('calibration_signal_close_found')->nullable();
            $table->unsignedBigInteger('calibration_signal_close_uom_found')->nullable();
            $table->foreign('calibration_signal_close_uom_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_signalclose_uom_found_fk');



            $table->string('calibration_supply_found')->nullable();
            $table->unsignedBigInteger('calibration_supply_uom_found')->nullable();
            $table->foreign('calibration_supply_uom_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_supply_uom_found_fk');

            $table->string('calibration_fail_action_found')->nullable();
            $table->unsignedBigInteger('calibration_fail_action_uom_found')->nullable();
            $table->foreign('calibration_fail_action_uom_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_failaction_uom_found_fk');





            $table->string('calibration_travel_left')->nullable();
            $table->unsignedBigInteger('calibration_travel_uom_left')->nullable();
            $table->foreign('calibration_travel_uom_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_travel_uom_left_fk');


            $table->string('calibration_bench_set_left')->nullable();
            $table->unsignedBigInteger('calibration_bench_set_uom_left')->nullable();
            $table->foreign('calibration_bench_set_uom_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_benchset_uom_left_fk');



            $table->string('calibration_signal_open_left')->nullable();
            $table->unsignedBigInteger('calibration_signal_open_uom_left')->nullable();
            $table->foreign('calibration_signal_open_uom_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_signalopen_uom_left_fk');



            $table->string('calibration_signal_close_left')->nullable();
            $table->unsignedBigInteger('calibration_signal_close_uom_left')->nullable();
            $table->foreign('calibration_signal_close_uom_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_signalclose_uom_left_fk');



            $table->string('calibration_supply_left')->nullable();
            $table->unsignedBigInteger('calibration_supply_uom_left')->nullable();
            $table->foreign('calibration_supply_uom_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_supply_uom_left_fk');

            $table->string('calibration_fail_action_left')->nullable();
            $table->unsignedBigInteger('calibration_fail_action_uom_left')->nullable();
            $table->foreign('calibration_fail_action_uom_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('calibration_failaction_uom_left_fk');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mvrr_calibrations');
    }
};
