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
            $table->boolean('ahc_checkbox')->default(false);
            $table->unsignedBigInteger('ahc_type_found')->nullable();
            $table->foreign('ahc_type_found')->references('id')->on('mvrr_repair_reports')->name('bc_type_found_fk');

            $table->unsignedBigInteger('ahc_size_found')->nullable();
            $table->foreign('ahc_size_found')->references('id')->on('mvrr_repair_reports')->name('bc_size_found_fk');

            $table->unsignedBigInteger('ahc_mounting_found')->nullable();
            $table->foreign('ahc_mounting_found')->references('id')->on('mvrr_repair_reports')->name('bc_mounting_found_fk');

            $table->unsignedBigInteger('ahc_action_found')->nullable();
            $table->foreign('ahc_action_found')->references('id')->on('mvrr_repair_reports')->name('bc_action_found_fk');

            $table->string('ahc_model_found')->nullable();
            $table->string('ahc_serial_found')->nullable();

            $table->unsignedBigInteger('ahc_type_left')->nullable();
            $table->foreign('ahc_type_left')->references('id')->on('mvrr_repair_reports')->name('bc_type_left_fk');

            $table->unsignedBigInteger('ahc_size_left')->nullable();
            $table->foreign('ahc_size_left')->references('id')->on('mvrr_repair_reports')->name('bc_size_left_fk');

            $table->unsignedBigInteger('ahc_mounting_left')->nullable();
            $table->foreign('ahc_mounting_left')->references('id')->on('mvrr_repair_reports')->name('bc_mounting_left_fk');

            $table->unsignedBigInteger('ahc_action_left')->nullable();
            $table->foreign('ahc_action_left')->references('id')->on('mvrr_repair_reports')->name('bc_action_left_fk');

            $table->string('ahc_model_left')->nullable();
            $table->string('ahc_serial_left')->nullable();

            $table->text('ahc_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mvrr_construction_isolation_valve', function (Blueprint $table) {
            $table->dropColumn([
                'ahc_checkbox',
                'ahc_type_found',
                'ahc_size_found',
                'ahc_mounting_found',
                'ahc_action_found',
                'ahc_model_found',
                'ahc_serial_found',
                'ahc_type_left',
                'ahc_size_left',
                'ahc_mounting_left',
                'ahc_action_left',
                'ahc_model_left',
                'ahc_serial_left',
                'ahc_note',
            ]);
        });
    }
};
