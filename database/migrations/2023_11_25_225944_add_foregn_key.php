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
        //
        Schema::table('orders', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('cart_id')->references('id')->on('carts');
        });

        Schema::table('carts', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });

        Schema::table('cart_items', function (Blueprint $table) {

            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

        });

        Schema::table('invoices', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders');

        });

        Schema::table('addresses', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });


        Schema::table('order_details', function (Blueprint $table) {

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

        });

        Schema::table('user_details', function (Blueprint $table) {

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
        Schema::table('product_detail', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        Schema::table('order_details', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        Schema::table('cart_items', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
