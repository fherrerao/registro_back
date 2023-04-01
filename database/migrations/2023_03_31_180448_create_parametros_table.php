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
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('valor');
            $table->integer('edad');
            $table->string('sexo');
            $table->unsignedBigInteger('idpruebas');
            $table->foreign('idpruebas')->references('id')->on('pruebas')->onDelete('cascade');
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametros');
    }
};
