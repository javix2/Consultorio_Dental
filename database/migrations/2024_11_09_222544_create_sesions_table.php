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
        Schema::create('sesion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('historial_tratams_id');
            $table->integer('sesion');
            $table->datetime('fecha');
            $table->string('medicamento')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('estado')->default('pendiente');
            $table->timestamps();

            // Definir la clave foránea
            $table->foreign('historial_tratams_id')
                  ->references('id')
                  ->on('historial_tratams')
                  ->onDelete('cascade');  // Elimina sesiones relacionadas si se borra el historial_tratams
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
