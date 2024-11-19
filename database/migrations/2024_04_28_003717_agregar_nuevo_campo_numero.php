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
            $table->string('numero_sesion')->nullable()->after('fecha');
            $table->string('medicamento')->nullable()->after('numero_sesion');
            $table->string('descripcion')->nullable()->after('medicamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historial_tratams', function (Blueprint $table) {
            //
        });
    }
};
