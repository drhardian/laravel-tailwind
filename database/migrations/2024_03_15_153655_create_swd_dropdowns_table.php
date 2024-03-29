<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swd_dropdowns', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index('IDX_Title');
            $table->string('alias')->index('IDX_Alias');
            $table->string('device_type')->index('IDX_DeviceType')->nullable();
            $table->foreign('device_type')->references('initial')->on('swd_device_types')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swd_dropdowns');
    }
};
