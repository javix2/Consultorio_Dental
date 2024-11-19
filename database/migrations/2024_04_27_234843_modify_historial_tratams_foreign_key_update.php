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
        Schema::table('historial_tratams', function (Blueprint $table) {
            $table->dropForeign(['paciente_id']);
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onUpdate('cascade');

            $table->dropForeign(['tratamiento_id']);
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onUpdate('cascade');

            
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historial_tratams', function (Blueprint $table) {
            $table->dropForeign(['paciente_id']);
            $table->foreign('paciente_id')->references('id')->on('clientes');

            $table->dropForeign(['tratamiento_id']);
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos');

        });
    }
};
