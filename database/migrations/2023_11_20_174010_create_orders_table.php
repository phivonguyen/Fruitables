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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cart_id')->unique();
            $table->string('user_description', 255);
            $table->string('received_address', 255);
            $table->string('payment_mode');
            $table->enum('status', ['Pending', 'Awaiting Payment', 'Shipping', 'Shipped', 'Cancelled', 'Declined', 'Refunded']);



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
