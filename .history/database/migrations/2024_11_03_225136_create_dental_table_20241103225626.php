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
        Schema::create('dental', function (Blueprint $table) {
            $table->id(); // ID automático
            $table->string('nume_diente'); // Número del diente
            $table->string('lado_diente'); // Número del diente
            $table->string('estado'); // Estado del diente

            $table->timestamps(); // Created at & Updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dental');
    }
};
