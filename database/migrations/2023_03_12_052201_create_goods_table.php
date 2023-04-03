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
            $table->unsignedInteger('id_category')->index('id_category');
            $table->unsignedSmallInteger('id_manufacturer')->index('id_manufacturer');
            $table->unsignedSmallInteger('id_provider')->index('id_provider');
            $table->char('Name');
            $table->unsignedInteger('Price');
            $table->unsignedInteger('Count');
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
