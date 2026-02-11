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
        Schema::create('mnt_contacto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('id_tipo_contacto')->constrained('ctl_tipo_contactos');
            $table->foreignId('id_persona')->constrained('mnt_persona');
            $table->foreignId('id_usuario_creacion')->constrained('users');
            $table->foreignId('id_usuario_actualizacion')->constrained('users');
            $table->foreignId('id_usuario_eliminacion')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_contacto');
    }
};
