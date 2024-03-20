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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('payment_id')->constrained('method_payments');
            $table->foreignId('point_id')->constrained('issue_points');
            $table->foreignId('status_id')->constrained('order_statuses')->default(1);
            $table->unsignedBigInteger('cost');
            $table->string('name');
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
