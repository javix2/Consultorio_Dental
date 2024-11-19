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
        // Schema::create('treatments', function (Blueprint $table) {
        //     $table->id();

        //     $table->string('nombre',45);
        //     $table->string('descripcion');
        //     $table->float('precio');

        //     $table->unsignedBigInteger('doctor_id');
        //     $table->foreign('doctor_id')
        //             ->references('id')
        //             ->on('doctors')
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
        Schema::dropIfExists('treatments');
    }
};
