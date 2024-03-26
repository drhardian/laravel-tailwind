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
        Schema::create('onwj_automationcontrol_assets', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('subarea');
            $table->string('platform');
            $table->string('description')->nullable();
            $table->string('tagnumber')->nullable();
            $table->string('asset_type')->nullable();
            $table->string('plc_brand')->nullable();
            $table->string('plc_controller')->nullable();
            $table->string('ows_os')->nullable();
            $table->string('ows_brand')->nullable();
            $table->string('ews_os')->nullable();
            $table->string('ews_brand')->nullable();
            $table->string('software_hmi')->nullable();
            $table->string('software_config')->nullable();
            $table->date('installation_date')->nullable();
            $table->string('operation_type')->nullable();
            $table->string('integritystatus')->nullable();
            $table->string('plc_status')->nullable();
            $table->string('hmi_status')->nullable();
            $table->string('ews_server_status')->nullable();
            $table->string('ups_status')->nullable();
            $table->string('environment_status')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('onwj_automationcontrol_assets');
    }
};
