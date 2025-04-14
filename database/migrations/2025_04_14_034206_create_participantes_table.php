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
        Schema::create('participantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')
                  ->constrained('eventos')
                  ->onDelete('cascade'); // Clave foránea referenciando la tabla 'eventos'

            $table->foreignId('equipo_id')
                  ->constrained('equipos')
                  ->onDelete('cascade'); // Clave foránea referenciando la tabla 'equipos'

            $table->string('resultado')->nullable(); // Permite almacenar el resultado (ej. "Ganador", "Perdedor", "Empate")
            $table->string('premios')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participantes');
    }
};
