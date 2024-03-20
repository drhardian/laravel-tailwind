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
        Schema::create('swd_location_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_type_id')->references('id')->on('swd_priority_ratings')->constrained()->cascadeOnDelete();
            $table->string('title')->unique()->index('IDX_location_title');
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
        Schema::dropIfExists('swd_location_details');
    }
};
