<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mnt_direcciones', function (Blueprint $table) {
            $table->id();
            $table->string('direccion', 100);
            $table->foreignId('id_distrito')->references('id')->on('ctl_distritos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_persona')->nullable()->constrained('mnt_persona')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_evento')->nullable()->constrained('mnt_eventos')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('id_usuario_creacion')->constrained('users');
            $table->foreignId('id_usuario_actualizacion')->constrained('users');
            $table->foreignId('id_tipo_direccion')->constrained('ctl_tipo_direcciones');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_direcciones');
    }
};
