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
        Schema::create('swd_tnk_assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('assessment_id')->references('id')->on('swd_assessments')->constrained()->cascadeOnDelete();
            $table->foreignUuid('product_id')->references('id')->on('swd_products')->constrained()->cascadeOnDelete();
            $table->string('main_product')->nullable();
            $table->string('other_product')->nullable();
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
        Schema::dropIfExists('swd_tnk_assessments');
    }
};
