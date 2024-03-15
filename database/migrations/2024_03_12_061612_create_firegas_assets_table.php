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
        Schema::create('firegas_assets', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('subarea');
            $table->string('platform');
            $table->string('tagnumber');
            $table->string('sensorlocation');
            $table->string('equipment_type');
            $table->string('asset_type')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('modelnumber')->nullable();
            $table->string('partnumber')->nullable();
            $table->string('serialnumber')->nullable();
            $table->date('startup')->nullable();
            $table->date('lastexecution')->nullable();
            $table->double('totalhours')->nullable();
            $table->double('numberoftagfailures')->nullable();
            $table->double('numberofserialfailures')->nullable();
            $table->double('testinterval')->nullable();
            $table->double('failurerate')->nullable();
            $table->double('pfd')->nullable();
            $table->string('integritystatus')->nullable();
            $table->text('defecthighlight')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('pm_activity_schedule')->nullable();
            $table->timestamps();

            $table->index('area','idx_area');
            $table->index('subarea','idx_subarea');
            $table->index('platform','idx_platform');
            $table->index('tagnumber','idx_tagnumber');
            $table->index('sensorlocation','idx_sensorlocation');
            $table->index('equipment_type','idx_equipmenttype');
            $table->index('asset_type','idx_assettype');
            $table->index('manufacturer','idx_manufacturer');
            $table->index('startup','idx_startup');
            $table->index('lastexecution','idx_lastexecution');
            $table->index('integritystatus','idx_integritystatus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firegas_assets');
    }
};
