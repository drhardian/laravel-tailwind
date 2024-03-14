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
        Schema::create('priority_matrices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('criticality_level_id')->constrained()->cascadeOnDelete();
            $table->foreignId('health_rating_id')->constrained()->cascadeOnDelete();
            $table->foreignId('priority_rating_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('priority_matrices');
    }
};
