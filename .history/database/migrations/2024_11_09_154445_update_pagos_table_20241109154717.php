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
        Schema::table('pagos', function (Blueprint $table) {
            // Eliminar llaves foráneas existentes
            $table->dropForeign(['paciente_id']);
            $table->dropForeign(['tratamiento_id']);

            // Eliminar las columnas relacionadas si no las necesitas
            $table->dropColumn(['paciente_id', 'tratamiento_id']);

            // Agregar la nueva columna para la relación con historial_tratams
            $table->unsignedBigInteger('historial_tratams_id')->after('id');

            // Definir la nueva llave foránea
            $table->foreign('historial_tratams_id')
                  ->references('id')->on('historial_tratams')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pagos', function (Blueprint $table) {
            // Restaurar las columnas eliminadas
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('tratamiento_id');

            // Restaurar las llaves foráneas originales
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');

            // Eliminar la nueva columna historial_tratams_id
            $table->dropForeign(['historial_tratams_id']);
            $table->dropColumn('historial_tratams_id');
        });
    }
};
