<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->enum('dia', ['lunes', 'martes', 'miércoles', 'jueves', 'viernes']);
            $table->string('salon', 20); //modifica lo de salón
            $table->timestamps();

            // Unique constraint to prevent duplicate records
            $table->unique(['nombre', 'hora_inicio', 'hora_fin', 'dia', 'salon']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
