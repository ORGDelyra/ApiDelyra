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
        Schema::create('product_selects', function (Blueprint $table) {
            $table->foreignId('id_producto')
                    ->constrained('products')
                    ->onDelete('cascade');
            $table->foreignId('id_carrito')
                    ->constrained('carts')
                    ->onDelete('cascade');
            $table->unsignedInteger('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_selects');
    }
};
