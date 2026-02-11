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
        Schema::create('mnt_evento_archivos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_evento')->references('id')->on('mnt_eventos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre',100);
            $table->string('tipo',100);
            $table->string('url',100);
            $table->foreignId('id_usuario_creacion')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_evento_archivos');
    }
};
