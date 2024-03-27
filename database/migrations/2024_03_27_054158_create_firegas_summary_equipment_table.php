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
        Schema::create('firegas_summary_equipment', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->double('total_tag')->nullable();
            $table->double('major_defect')->nullable();
            $table->double('minor_defect')->nullable();
            $table->double('good_condition')->nullable();
            $table->double('integrity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firegas_summary_equipment');
    }
};
