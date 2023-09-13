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
        Schema::table('mvrr_construction_isolation_valve', function (Blueprint $table) {
            $table->boolean('pc_checkbox')->default(false);

            $table->unsignedBigInteger('pc_brand_found')->nullable();
            $table->foreign('pc_brand_found')->references('id')->on('mvrr_repair_reports')->name('pc_brand_found_fk');

            $table->string('pc_model_found')->nullable();
            $table->string('pc_serial_number_found')->nullable();

            $table->unsignedBigInteger('pc_action_found')->nullable();
            $table->foreign('pc_action_found')->references('id')->on('mvrr_repair_reports')->name('pc_action_found_fk');


            $table->unsignedBigInteger('pc_brand_left')->nullable();
            $table->foreign('pc_brand_left')->references('id')->on('mvrr_repair_reports')->name('pc_brand_left_fk');

            $table->string('pc_model_left')->nullable();
            $table->string('pc_serial_number_left')->nullable();

            $table->unsignedBigInteger('pc_action_left')->nullable();
            $table->foreign('pc_action_left')->references('id')->on('mvrr_repair_reports')->name('pc_action_left_fk');

            $table->text('pc_note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mvrr_construction_isolation_valve', function (Blueprint $table) {
            $table->dropColumn([
                'pc_checkbox',
                'pc_brand_found',
                'pc_model_found',
                'pc_serial_number_found',
                'pc_action_found',

                'pc_brand_left',
                'pc_model_left',
                'pc_serial_number_left',
                'pc_action_left',

                'pc_note',

            ]);
        });
    }
};
