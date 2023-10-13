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
        Schema::create('eproc_materials', function (Blueprint $table) {
            $table->id();
            $table->string('materialmain_code');
            $table->string('material_code');
            $table->string('materialsub_code');
            $table->string('materialgroup_code');
            $table->string('descrip')->nullable();
            $table->string('specif')->nullable();
            $table->string('brand_eproc')->nullable();
            $table->string('uom_eproc')->nullable();
            $table->string('price')->nullable();
            $table->string('material_image')->nullable();
            $table->timestamps();
            $table->foreign('unit_rate_id')->references('id')->on('unit_rate');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eproc_materials');
    }
};
