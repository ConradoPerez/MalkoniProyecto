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
        // Migración para la tabla Servicio
Schema::create('servicios', function (Blueprint $table) {
    $table->id('id_servicio'); // id_servicio integer [primary key]
    $table->string('nombre', 255);
    $table->text('descripcion')->nullable();
    $table->integer('nro_api_opt')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
