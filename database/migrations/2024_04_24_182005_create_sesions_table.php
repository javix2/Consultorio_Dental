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
        Schema::create('sesions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('historial_tratam_id');
            $table->date('fecha_sesion');
            $table->integer('numero_sesion')->nullable();
            $table->string('medicamento')->nullable();
            $table->boolean('estado')->default(false);

            $table->timestamps();
            $table->foreign('historial_tratam_id')->references('id')->on('historial_tratams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesions');
    }
};
