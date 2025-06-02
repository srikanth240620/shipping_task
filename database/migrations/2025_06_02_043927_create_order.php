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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('product_id', 800)->nullable();
            $table->integer('status');
            $table->string('first_name', 300)->nullable();
            $table->string('last_name', 300)->nullable();
            $table->string('address', 700)->nullable();
            $table->string('city', 300)->nullable();
            $table->string('state', 300)->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('cart_number', 20)->nullable();
            $table->string('security_code', 10)->nullable();
            $table->string('name_on_cart', 300)->nullable();
            $table->string('expiration_date', 20)->nullable();
            $table->integer('tax_amount');
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
        Schema::dropIfExists('order');
    }
};
