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
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('valor');
            $table->integer('promedio');
            $table->unsignedBigInteger('idparametros');
            $table->unsignedBigInteger('iddestrezas')->nullable();
            $table->unsignedBigInteger('idcalificaciones');
            $table->foreign('idparametros')->references('id')->on('parametros')->onDelete('cascade');
            $table->foreign('iddestrezas')->references('id')->on('destrezas')->onDelete('cascade');
            $table->foreign('idcalificaciones')->references('id')->on('calificaciones')->onDelete('cascade');
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
