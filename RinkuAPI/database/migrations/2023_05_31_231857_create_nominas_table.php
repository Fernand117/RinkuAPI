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
        Schema::create('nominas', function (Blueprint $table) {
            $table->id();
            $table->string('mes');
            $table->string('entregas');
            $table->string('horas_trabajadas');
            $table->string('sueldo_bruto');
            $table->string('sueldo_neto');
            $table->unsignedBigInteger('id_empleado');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('id_empleado')->references('id')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nominas');
    }
};
