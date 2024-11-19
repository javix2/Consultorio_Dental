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
        Schema::create('historials', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('paciente_id');
            $table->string('distrto', 256);

            $table->integer('no_hc')->nullable(0);
            $table->dateTime('fecha_aper');

            $table->string('apoderado')->nullable();
            $table->string('parentesco')->nullable();
            $table->string('direccion')->nullable();
            $table->string('celular')->nullable();
            
            $table->string('motivo');

            $table->string('enf_act')->nullable();
            $table->string('alergias')->nullable();
            $table->string('medicamentos')->nullable();

            $table->string('hab_alimen', 100);
            $table->string('hab_higiene', 100);

            $table->string('tabaco')->nullable();
            $table->string('otro')->nullable();

            $table->string('cardiovas', 100);
            $table->string('pulmonares', 100);
            $table->string('renales', 100);
            $table->string('gastrointes', 100);
            $table->string('endocrinas', 100);
            $table->string('osteoarticu', 100);
            $table->string('metabolicas', 100);
            $table->string('infecciosas', 100);

            $table->text('interve_prev')->nullable();
            $table->text('notas')->nullable();
            $table->timestamps();
            
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historials');
    }
};
