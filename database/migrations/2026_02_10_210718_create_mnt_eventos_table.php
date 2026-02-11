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
        Schema::create('mnt_eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->text('descripcion');
            $table->text('slug');
            $table->string('imagen',100);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->text('localidad')->nullable();
            $table->boolean('estado')->default(true);
            $table->boolean('es_online')->default(false);
            $table->string('meet_url',500)->nullable();
            $table->integer('cantidad_asistentes')->default(0);
            $table->foreignId('id_categoria')->references('id')->on('ctl_categorias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_usuario_creacion')->constrained('users');
            $table->foreignId('id_usuario_actualizacion')->constrained('users');
            $table->foreignId('id_usuario')->constrained('users');
            $table->boolean('es_silla_numerada')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mnt_eventos');
    }
};
