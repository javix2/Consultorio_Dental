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
            // Agregar columna dental_id después de paciente_id
            $table->unsignedBigInteger('dental_id')->after('paciente_id');

            // Definir la clave foránea
            $table->foreign('dental_id')->references('id')->on('dentals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('odontogramas', function (Blueprint $table) {
            // Eliminar la clave foránea primero
            $table->dropForeign(['dental_id']);
            $table->dropColumn('dental_id'); // Eliminar la columna dental_id
        });
    }
};
