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
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->float('total_price')->default(0.0);
            $table->float('price_before')->default(0.0);
            $table->float('tax')->default(0.0);
            $table->float('discount')->default(0.0);
            $table->unsignedTinyInteger('status')->default(0)->comment('0: pending, 1: completed, 2: canceled');
            $table->timestamps();
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
