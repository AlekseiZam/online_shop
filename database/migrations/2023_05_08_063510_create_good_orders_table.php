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
        Schema::create('good_orders', function (Blueprint $table) {
            $table->id();
            $table->unique(['order_id', 'good_id']);
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('good_id')->constrained('goods');
            $table->unsignedBigInteger('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('good_orders');
    }
};
