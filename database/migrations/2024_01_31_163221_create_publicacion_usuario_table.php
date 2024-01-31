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
        Schema::create('publicacion_usuario', function (Blueprint $table) {
            $table->foreignId('publicacion_id')->constrained('publicaciones');
            $table->foreignId('usuario_id')->constrained('users');
            $table->primary(['publicacion_id', 'usuario_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacion_usuario');
    }
};
