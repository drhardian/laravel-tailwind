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
            $table->boolean('aa_checkbox')->default(false);
            $table->unsignedBigInteger('aa_actuated_automation_type_found')->nullable();
            $table->foreign('aa_actuated_automation_type_found')->references('id')->on('mvrr_repair_reports')->name('aa_actuated_automation_type_found_fk');

            $table->unsignedBigInteger('aa_type_found')->nullable();
            $table->foreign('aa_type_found')->references('id')->on('mvrr_repair_reports')->name('aa_type_found_fk');

            $table->unsignedBigInteger('aa_brand_found')->nullable();
            $table->foreign('aa_brand_found')->references('id')->on('mvrr_repair_reports')->name('aa_brand_found_fk');

            $table->unsignedBigInteger('aa_size_found')->nullable();
            $table->foreign('aa_size_found')->references('id')->on('mvrr_repair_reports')->name('aa_size_found_fk');

            $table->unsignedBigInteger('aa_fail_mode_found')->nullable();
            $table->foreign('aa_fail_mode_found')->references('id')->on('mvrr_repair_reports')->name('aa_fail_mode_found_fk');

            $table->string('aa_model_found')->nullable();
            $table->string('aa_serial_number_found')->nullable();

            $table->unsignedBigInteger('aa_actuated_automation_type_left')->nullable();
            $table->foreign('aa_actuated_automation_type_left')->references('id')->on('mvrr_repair_reports')->name('aa_actuated_automation_type_left_fk');

            $table->unsignedBigInteger('aa_type_left')->nullable();
            $table->foreign('aa_type_left')->references('id')->on('mvrr_repair_reports')->name('aa_type_left_fk');

            $table->unsignedBigInteger('aa_brand_left')->nullable();
            $table->foreign('aa_brand_left')->references('id')->on('mvrr_repair_reports')->name('aa_brand_left_fk');

            $table->unsignedBigInteger('aa_size_left')->nullable();
            $table->foreign('aa_size_left')->references('id')->on('mvrr_repair_reports')->name('aa_size_left_fk');

            $table->unsignedBigInteger('aa_fail_mode_left')->nullable();
            $table->foreign('aa_fail_mode_left')->references('id')->on('mvrr_repair_reports')->name('aa_fail_mode_left_fk');

            $table->string('aa_model_left')->nullable();
            $table->string('aa_serial_number_left')->nullable();

            $table->text('aa_note')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mvrr_construction_isolation_valve', function (Blueprint $table) {
            $table->dropColumn([
                'aa_checkbox',
                'aa_actuated_automation_type_found',
                'aa_type_found',
                'aa_brand_found',
                'aa_size_found',
                'aa_fail_mode_found',
                'aa_model_found',
                'aa_serial_number_found',
                'aa_actuated_automation_type_left',
                'aa_type_left',
                'aa_brand_left',
                'aa_size_left',
                'aa_fail_mode_left',
                'aa_model_left',
                'aa_serial_number_left',
                'aa_note',

            ]);
        });
    }
};
