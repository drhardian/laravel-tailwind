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
        Schema::create('assessment_images', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('assessment_id')->constrained();
            $table->foreignUuid('product_id')->constrained();
            $table->string('subject_id');
            $table->string('file_initial_name');
            $table->string('file_name');
            $table->string('path');
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
        Schema::dropIfExists('assessment_images');
    }
};
