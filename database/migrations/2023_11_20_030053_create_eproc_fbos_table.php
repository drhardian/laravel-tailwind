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
        Schema::create('eproc_fbos', function (Blueprint $table) {
            $table->id();
            $table->string('required_by')->nullable();
            $table->string('division')->nullable();
            $table->date('request_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('type_process')->nullable();
            $table->string('upload_srf')->nullable();
            $table->string('tkdn_required')->nullable();
            $table->string('minimum')->nullable();
            $table->string('required_category')->nullable();
            $table->string('eprocmethod')->nullable();
            $table->string('statusfbo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eproc_fbos');
    }
};
