<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Database\Seeders\ProductsTableSeeder;
use Illuminate\Support\Facades\Artisan;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 300);
            $table->string('description', 700);
            $table->text('image')->nullable();
            $table->text('color')->nullable();
            $table->text('size')->nullable();
            $table->integer('price');
            $table->tinyInteger('status')->default(1)->comment('1:active;0:inactive');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Artisan::call('db:seed', [
            '--class' => ProductsTableSeeder::class,
            '--force' => true,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
