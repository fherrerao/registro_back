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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('bimestre');
            $table->string('pruebas');
            $table->string('destrezas');
            $table->float('nota',10,2);
            $table->boolean('supletorio');
            $table->unsignedBigInteger('idcadete');
            $table->unsignedBigInteger('idanio');
            $table->foreign('idcadete')->references('id')->on('cadete')->onDelete('cascade');
            $table->foreign('idanio')->references('id')->on('anio')->onDelete('cascade');
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
