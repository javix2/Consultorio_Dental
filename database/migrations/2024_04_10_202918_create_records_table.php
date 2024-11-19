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
        // Schema::create('records', function (Blueprint $table) {
        //     $table->id();

        //     $table->dateTime('fecha_aper');
        //     $table->string('habitos_alim');
        //     $table->string('enfermedad_act');
        //     $table->string('alergias');
        //     $table->string('medicamento');

        //     $table->unsignedBigInteger('patient_id');
        //     $table->foreign('patient_id')
        //             ->references('id')
        //             ->on('patients')
        //             ->onDelete('cascade')
        //             ->onUpdate('cascade');

        //     $table->unsignedBigInteger('record_treatm_id');
        //     $table->foreign('record_treatm_id')
        //             ->references('id')
        //             ->on('record_treatms')
        //             ->onDelete('cascade')
        //             ->onUpdate('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
