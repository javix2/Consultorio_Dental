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
        // Schema::create('odontograms', function (Blueprint $table) {
        //     $table->id();

        //     $table->integer('numero_diente');
        //     $table->string('estado',45);

        //     $table->unsignedBigInteger('patient_id');
        //     $table->foreign('patient_id')
        //             ->references('id')
        //             ->on('patients')
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
        Schema::dropIfExists('odontograms');
    }
};
