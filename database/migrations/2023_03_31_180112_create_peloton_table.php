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
        Schema::create('peloton', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('descripcion');
            $table->unsignedBigInteger('idseccion');
            $table->foreign('idseccion')->references('id')->on('seccion')->onDelete('cascade');
            $table->unsignedBigInteger('iddocente');
            $table->foreign('iddocente')->references('id')->on('docente')->onDelete('cascade');
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peloton');
    }
};
