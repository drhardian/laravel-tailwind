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
        Schema::create('psvdata_valve', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('general_id');
            $table->string('manufacture')->nullable();
            $table->string('model_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('size_in')->nullable();
            $table->string('rating_in')->nullable();
            $table->string('size_out')->nullable();
            $table->string('rating_out')->nullable();
            $table->string('press')->nullable();
            $table->string('vacuum')->nullable();
            $table->string('psv')->nullable();
            $table->string('design')->nullable();
            $table->string('selection')->nullable();
            $table->string('psv_capacity')->nullable();
            $table->string('psv_capacityunit')->nullable();
            $table->string('bonnet')->nullable();
            $table->string('seat')->nullable();
            $table->string('CAP')->nullable();
            $table->string('body_bonnet')->nullable();
            $table->string('disc_material')->nullable();
            $table->string('spring_material')->nullable();
            $table->string('guide_material')->nullable();
            $table->string('resilient_seat')->nullable();
            $table->string('bellow_material')->nullable();
            $table->date('year_build')->nullable();
            $table->date('year_install')->nullable();
            $table->timestamps();
            $table->foreign('general_id')->references('id')->on('psvdata_general');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psvdata_valve');
    }
};
