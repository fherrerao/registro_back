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
        Schema::create('destrezas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("descripcion");
            $table->integer('valor');
            $table->integer('promedio');
            $table->integer('maximo');
            $table->integer('minimo');
            $table->string('sexo');
            $table->unsignedBigInteger('idanio');
            $table->foreign('idanio')->references('id')->on('anio')->onDelete('cascade');
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destrezas');
    }
};
