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
        Schema::create('swd_priority_matrices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criticality_level_id')->references('id')->on('swd_criticality_levels')->constrained()->cascadeOnDelete();
            $table->foreignId('health_rating_id')->references('id')->on('swd_health_ratings')->constrained()->cascadeOnDelete(); // column id from table health_ratings
            $table->foreignId('priority_rating_id')->references('id')->on('swd_priority_ratings')->constrained()->cascadeOnDelete(); // column id from table health_ratings
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
        Schema::dropIfExists('swd_priority_matrices');
    }
};
