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
        Schema::create('catalog_dropdown_codeitems', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('title');
            $table->string('dropdown_alias');
            $table->unique(['code','title','dropdown_alias']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_dropdown_codeitems');
    }
};
