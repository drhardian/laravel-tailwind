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
        Schema::create('inventory_prodins', function (Blueprint $table) {
            $table->id();
            $table->string('prodin_image')->nullable();
            $table->string('prodin_origin')->nullable();
            $table->string('prodin_noref')->nullable();
            $table->string('prod_code')->nullable();
            $table->string('inv_stock')->nullable();
            $table->string('prod_name')->nullable();
            // $table->string('remaining_stock')->nullable();
            $table->string('inv_brand')->nullable();
            $table->string('inv_owner')->nullable();
            $table->string('inv_category')->nullable();
            $table->date('date_in')->nullable();
            $table->string('inv_uom')->nullable();
            $table->string('inv_supplier')->nullable();
            $table->string('inv_spec')->nullable();
            $table->string('stock_loc')->nullable();
            $table->decimal('inv_price', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_prodins');
    }
};
