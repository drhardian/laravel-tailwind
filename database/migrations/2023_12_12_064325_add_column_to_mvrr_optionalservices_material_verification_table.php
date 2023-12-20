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
        Schema::table('mvrr_optionalservices', function (Blueprint $table) {

            $table->boolean('material_verification_checkbox')->default(false);
            $table->unsignedBigInteger('mv_body_found')->nullable();
            $table->foreign('mv_body_found')->references('id')->on('mvrr_repair_reports')->name('mv_body_foundfk');
            $table->unsignedBigInteger('mv_pdb_found')->nullable();
            $table->foreign('mv_pdb_found')->references('id')->on('mvrr_repair_reports')->name('mv_pdb_foundfk');
            $table->unsignedBigInteger('mv_stem_shaft_found')->nullable();
            $table->foreign('mv_stem_shaft_found')->references('id')->on('mvrr_repair_reports')->name('mv_stem_shaft_foundfk');
            $table->unsignedBigInteger('mv_cage_found')->nullable();
            $table->foreign('mv_cage_found')->references('id')->on('mvrr_repair_reports')->name('mv_cage_foundfk');
            $table->unsignedBigInteger('mv_seat_found')->nullable();
            $table->foreign('mv_seat_found')->references('id')->on('mvrr_repair_reports')->name('mv_seat_foundfk');
            $table->unsignedBigInteger('mv_bushing_found')->nullable();
            $table->foreign('mv_bushing_found')->references('id')->on('mvrr_repair_reports')->name('mv_bushing_foundfk');
            $table->unsignedBigInteger('mv_body_bonnet_found')->nullable();
            $table->foreign('mv_body_bonnet_found')->references('id')->on('mvrr_repair_reports')->name('mv_body_bonnet_foundfk');
            $table->unsignedBigInteger('mv_gasket_found')->nullable();
            $table->foreign('mv_gasket_found')->references('id')->on('mvrr_repair_reports')->name('mv_gasket_foundfk');
            $table->unsignedBigInteger('mv_body_left')->nullable();
            $table->foreign('mv_body_left')->references('id')->on('mvrr_repair_reports')->name('mv_body_leftfk');
            $table->unsignedBigInteger('mv_pdb_left')->nullable();
            $table->foreign('mv_pdb_left')->references('id')->on('mvrr_repair_reports')->name('mv_pdb_leftfk');
            $table->unsignedBigInteger('mv_stem_shaft_left')->nullable();
            $table->foreign('mv_stem_shaft_left')->references('id')->on('mvrr_repair_reports')->name('mv_stem_shaft_leftfk');
            $table->unsignedBigInteger('mv_cage_left')->nullable();
            $table->foreign('mv_cage_left')->references('id')->on('mvrr_repair_reports')->name('mv_cage_leftfk');
            $table->unsignedBigInteger('mv_seat_left')->nullable();
            $table->foreign('mv_seat_left')->references('id')->on('mvrr_repair_reports')->name('mv_seat_leftfk');
            $table->unsignedBigInteger('mv_bushing_left')->nullable();
            $table->foreign('mv_bushing_left')->references('id')->on('mvrr_repair_reports')->name('mv_bushing_leftfk');
            $table->unsignedBigInteger('mv_body_bonnet_left')->nullable();
            $table->foreign('mv_body_bonnet_left')->references('id')->on('mvrr_repair_reports')->name('mv_body_bonnet_leftfk');
            $table->unsignedBigInteger('mv_gasket_left')->nullable();
            $table->foreign('mv_gasket_left')->references('id')->on('mvrr_repair_reports')->name('mv_gasket_leftfk');
            $table->unsignedBigInteger('mv_note')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mvrr_optionalservices', function (Blueprint $table) {
            $table->dropColumn([
            'material_verification_checkbox',
            'mv_body_found',
            'mv_pdb_found',
            'mv_stem_shaft_found',
            'mv_cage_found',
            'mv_seat_found',
            'mv_bushing_found',
            'mv_body_bonnet_found',
            'mv_gasket_found',
            'mv_body_left',
            'mv_pdb_left',
            'mv_stem_shaft_left',
            'mv_cage_left',
            'mv_seat_left',
            'mv_bushing_left',
            'mv_body_bonnet_left',
            'mv_gasket_left',
            'mv_note',
        ]);

        });
    }
};
