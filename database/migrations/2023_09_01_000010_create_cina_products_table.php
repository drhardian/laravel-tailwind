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
        Schema::create('cina_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('cina_product_origin_id')->constrained();
            $table->string('material_transfer');
            $table->string('reservation_number')->nullable();
            $table->string('ex_station')->nullable();
            $table->string('old_id')->nullable();
            $table->string('new_id')->nullable();
            $table->string('sdv_in')->nullable();
            $table->string('sdv_out')->nullable();
            $table->string('station')->nullable();
            $table->string('requestor')->nullable();
            $table->string('project')->nullable();
            $table->string('dt_out')->nullable();
            $table->date('date_to_offshore')->nullable();
            $table->string('material_transfer_to_offshore')->nullable();
            $table->string('cina_product_location_id');
            $table->date('in_date')->nullable();
            $table->double('in_qty')->nullable();
            $table->string('in_uom')->nullable();
            $table->date('out_date')->nullable();
            $table->double('out_qty')->nullable();
            $table->string('out_uom')->nullable();
            $table->date('target_pdn')->nullable();
            $table->string('cs_release')->nullable();
            $table->string('cs_number')->nullable();
            $table->string('ce_number')->nullable();
            $table->string('ro_number')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->double('repair_price')->nullable();
            $table->longText('notes')->nullable();
            $table->foreignId('cina_asset_type_id')->nullable()->constrained();
            $table->string('brand')->nullable();
            $table->string('equipment');
            $table->string('valve_type');
            $table->string('valve_size')->nullable();
            $table->string('valve_rating')->nullable();
            $table->string('end_connection')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('valve_model')->nullable();
            $table->string('valve_condition');
            $table->string('actuator_brand')->nullable();
            $table->string('actuator_type')->nullable();
            $table->string('actuator_size')->nullable();
            $table->string('actuator_condition')->nullable();
            $table->string('fail_position')->nullable();
            $table->string('positioner_brand')->nullable();
            $table->string('positioner_model')->nullable();
            $table->string('positioner_condition')->nullable();
            $table->string('input_signal')->nullable();
            $table->string('other_accessories')->nullable();
            $table->string('instrument_type')->nullable();
            $table->string('bulk_material_type')->nullable();
            $table->string('sparepart_description')->nullable();
            $table->string('sparepart_number')->nullable();
            $table->string('part_description')->nullable();
            $table->timestamps();
            // $table->foreignId('cina_product_location_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cina_products');
    }
};
