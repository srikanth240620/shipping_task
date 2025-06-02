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
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name', 500)->nullable();
            $table->integer('status');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->text('image')->nullable();
            $table->string('size', 100);
            $table->string('color', 300);
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('total_amount');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
