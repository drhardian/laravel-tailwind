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
        Schema::create('mvrr_repair_reports', function (Blueprint $table) {
            $table->id();
            $table->string('customer');
            $table->string('contact_person')->nullable();
            $table->string('title')->nullable();
            $table->string('email_address')->nullable();
            $table->string('end_user')->nullable();
            $table->string('so_reference')->nullable();
            $table->string('project')->nullable();
            $table->unsignedBigInteger('work_type')->nullable();
            $table->unsignedBigInteger('order_type')->nullable();
            $table->unsignedBigInteger('scope_of_work')->nullable();
            $table->unsignedBigInteger('repair_type')->nullable();
            $table->string('performed_by')->nullable();
            $table->string('title_performed')->nullable();
            $table->string('email_address_performed')->nullable();
            $table->date('start_date')->nullable();
            $table->date('estimate_end_date')->nullable();
            $table->boolean('field_diagnostic_only_job')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mvrr_repair_reports');
    }
};
