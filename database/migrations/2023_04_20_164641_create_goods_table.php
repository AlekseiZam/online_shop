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
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->index()->constrained('categories');
            $table->foreignId('brand_id')->nullable()->index()->constrained('brands');
            $table->foreignId('manufacturer_id')->nullable()->index()->constrained('manufacturers');
            $table->string('name');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('count');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods');
    }
};
