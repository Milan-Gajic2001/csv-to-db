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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name', 50);
            $table->smallInteger('days_valid');
            $table->tinyInteger('priority');
            $table->string('part_number', 50);
            $table->string('part_desc', 255);
            $table->integer('quantity');
            $table->integer('price');
            $table->string('condition', 50);
            $table->string('category', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
