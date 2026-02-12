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
        Schema::create('mnt_persona', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('estado');
            $table->foreignId('id_genero')->constrained('ctl_genero');
            $table->date('fecha_nacimiento');
            $table->foreignId('id_usuario_creacion')->nullable()->constrained('users');
            $table->foreignId('id_usuario_actualizacion')->nullable()->constrained('users');
            $table->foreignId('id_usuario_eliminacion')->nullable()->constrained('users');
            $table->foreignId('id_usuario')->constrained('users');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_persona');
    }
};
