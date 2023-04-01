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
        Schema::create('docente', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('correo');
            $table->string('clave');
            $table->string('claveTemp');
            $table->string('estado');            
            $table->unsignedBigInteger('idrol');            
            $table->foreign('idrol')->references('id')->on('roles')->onDelete('cascade');            
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente');
    }
};
