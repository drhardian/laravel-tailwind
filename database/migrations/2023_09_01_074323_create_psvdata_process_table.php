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
        Schema::create('psvdata_process', function (Blueprint $table) {
            $table->id();
            $table->string('service')->nullable();
            $table->string('equip_number')->nullable();
            $table->string('pid')->nullable();
            $table->string('size_basic')->nullable();
            $table->string('size_code')->nullable();
            $table->string('fluid')->nullable();
            $table->string('required')->nullable();
            $table->string('capacity_unit')->nullable();
            $table->string('mawp')->nullable();
            $table->string('operating_psi')->nullable();
            $table->string('back_psi')->nullable();
            $table->string('operating_temp')->nullable();
            $table->string('cold_diff')->nullable();
            $table->string('allowable')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psvdata_process');
    }
};
