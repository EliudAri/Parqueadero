<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->id(); // Campo id auto incrementable
            $table->string('nombre');
            $table->string('identificacion')->unique();
            $table->integer('cantidadDeVehiculos');
            $table->string('placaVehiculo')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps(); // Para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propietarios');
    }
};
