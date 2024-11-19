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
        Schema::table('odontogramas', function (Blueprint $table) {
            // Agregar campos después de paciente_id
            $table->integer('num_diente')->after('paciente_id'); // Campo para número de diente
            $table->string('lado_diente')->after('num_diente'); // Campo para lado de diente
            $table->string('estado')->after('lado_diente'); // Campo para estado del diente
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('odontogramas', function (Blueprint $table) {
            // Eliminar las columnas si se hace rollback
            $table->dropColumn(['num_diente', 'lado_diente', 'estado']);
        });
    }
};
