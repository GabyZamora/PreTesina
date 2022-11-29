<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLugarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugars', function (Blueprint $table) {
            $table->id();
            $table ->string('slug',100)->unique();
            $table ->string('nombre',100)->unique();
            $table ->text('descripcion');
            $table ->string('urlfoto',100)->default("foto.jpg");
            $table ->string('latitud',15);
            $table ->string('longitud',15);
            $table ->boolean('estado')->default(0);
            $table ->decimal('precio', 7,2);
            $table ->string('numHuesped', 3);
            $table ->boolean('mascotas')->default(0);
            $table ->foreignId('ruta_id')->constrained();
            $table ->foreignId('user_id')->constrained();
            $table ->foreignId('categoria_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lugars');
    }
}
