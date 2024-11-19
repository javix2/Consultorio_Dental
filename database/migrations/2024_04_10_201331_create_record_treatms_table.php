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
        // Schema::create('record_treatms', function (Blueprint $table) {
        //     $table->id();

        //     $table->date('fecha_pago');
        //     $table->float('monto');
        //     $table->float('saldo');
        //     $table->string('estado',45);
        //     $table->integer('num_pieza');

        //     $table->unsignedBigInteger('patient_id');
        //     $table->foreign('patient_id')
        //             ->references('id')
        //             ->on('patients')
        //             ->onDelete('cascade')
        //             ->onUpdate('cascade');

        //     $table->unsignedBigInteger('treatment_id');
        //     $table->foreign('treatment_id')
        //             ->references('id')
        //             ->on('treatments')
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
        Schema::dropIfExists('record_treatms');
    }
};
