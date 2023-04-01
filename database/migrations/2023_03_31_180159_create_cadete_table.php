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
        Schema::create('cadete', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cedula');
            $table->string('nombres');
            $table->string('apellidos');
            $table->integer('edad');
            $table->string('genero');
            $table->boolean('especialista');
            $table->date('fec_nac');            
            $table->unsignedBigInteger('idpeloton');            
            $table->foreign('idpeloton')->references('id')->on('peloton')->onDelete('cascade');            
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadete');
    }
};
