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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaccion')
                    ->constrained('payment_transactions')
                    ->onDelete('cascade');
            $table->foreignId('id_servicio')
                    ->nullable()
                    ->constrained('services')
                    ->onDelete('set null');
            $table->date('fecha_estimada');
            $table->string('estado')->default('espera');
            $table->decimal('total',10,3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
