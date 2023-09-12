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
        Schema::create('mvrr_construction_isolation_valve', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repair_report_id');
            $table->foreign('repair_report_id')->references('id')->on('mvrr_repair_reports');
            $table->boolean('bc_checkbox')->nullable();
            $table->unsignedBigInteger('bc_brand_found')->nullable();
            $table->foreign('bc_brand_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_brand_found_fk');
            $table->string('bc_model_found')->nullable();
            $table->string('bc_serial_number_found')->nullable();
            $table->unsignedBigInteger('bc_type_found')->nullable();
            $table->foreign('bc_type_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_type_found_fk');
            $table->unsignedBigInteger('bc_size_found')->nullable();
            $table->foreign('bc_size_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_size_found_fk');
            $table->unsignedBigInteger('bc_port_found')->nullable();
            $table->foreign('bc_port_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_port_found_fk');
            $table->unsignedBigInteger('bc_pressure_class_found')->nullable();
            $table->foreign('bc_pressure_class_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_pressure_class_found_fk');
            $table->unsignedBigInteger('bc_end_connection_found')->nullable();
            $table->foreign('bc_end_connection_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_end_connection_found_fk');
            $table->unsignedBigInteger('bc_bonnet_style_found')->nullable();
            $table->foreign('bc_bonnet_style_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_bonnet_style_found_fk');
            $table->unsignedBigInteger('bc_packing_configuration_found')->nullable();
            $table->foreign('bc_packing_configuration_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_packing_configuration_found_fk');
            $table->unsignedBigInteger('bc_live_loaded_found')->nullable();
            $table->foreign('bc_live_loaded_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_live_loaded_found_fk');
            $table->unsignedBigInteger('bc_body_material_found')->nullable();
            $table->foreign('bc_body_material_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_body_material_found_fk');
            $table->unsignedBigInteger('bc_pdb_material_found')->nullable();
            $table->foreign('bc_pdb_material_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_pdb_material_found_fk');
            $table->unsignedBigInteger('bc_steam_shaft_material_found')->nullable();
            $table->foreign('bc_steam_shaft_material_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_steam_shaft_material_found_fk');
            $table->unsignedBigInteger('bc_seat_material_found')->nullable();
            $table->foreign('bc_seat_material_found')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_seat_material_found_fk');
            $table->unsignedBigInteger('bc_brand_left')->nullable();
            $table->foreign('bc_brand_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_brand_left_fk');
            $table->string('bc_model_left')->nullable();
            $table->string('bc_serial_number_left')->nullable();
            $table->unsignedBigInteger('bc_type_left')->nullable();
            $table->foreign('bc_type_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_type_left_fk');
            $table->unsignedBigInteger('bc_size_left')->nullable();
            $table->foreign('bc_size_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_size_left_fk');
            $table->unsignedBigInteger('bc_port_left')->nullable();
            $table->foreign('bc_port_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_port_left_fk');
            $table->unsignedBigInteger('bc_pressure_class_left')->nullable();
            $table->foreign('bc_pressure_class_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_pressure_class_left_fk');
            $table->unsignedBigInteger('bc_end_connection_left')->nullable();
            $table->foreign('bc_end_connection_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_end_connection_left_fk');
            $table->unsignedBigInteger('bc_bonnet_style_left')->nullable();
            $table->foreign('bc_bonnet_style_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_bonnet_style_left_fk');
            $table->unsignedBigInteger('bc_packing_configuration_left')->nullable();
            $table->foreign('bc_packing_configuration_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_packing_configuration_left_fk');
            $table->unsignedBigInteger('bc_live_loaded_left')->nullable();
            $table->foreign('bc_live_loaded_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_live_loaded_left_fk');
            $table->unsignedBigInteger('bc_body_material_left')->nullable();
            $table->foreign('bc_body_material_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_body_material_left_fk');
            $table->unsignedBigInteger('bc_pdb_material_left')->nullable();
            $table->foreign('bc_pdb_material_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_pdb_material_left_fk');
            $table->unsignedBigInteger('bc_steam_shaft_material_left')->nullable();
            $table->foreign('bc_steam_shaft_material_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_steam_shaft_material_left_fk');
            $table->unsignedBigInteger('bc_seat_material_left')->nullable();
            $table->foreign('bc_seat_material_left')->references('id')->on('mvrr_valve_repair_dropdown')->name('bc_seat_material_left_fk');
            $table->string('bc_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mvrr_construction_isolation_valve');
    }
};
