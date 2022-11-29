<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosts', function (Blueprint $table) {
            $table->id();
            $table ->string('slug',100)->unique();
            $table ->string('nombre',100);
            $table ->text('descripcion');
            $table ->string('urlfoto',100)->default("foto.jpg");
            $table ->string('urllogo',100)->nullable();
            $table ->boolean('estado')->default(0);
            $table ->foreignId('ruta_id')->constrained();
            $table ->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('hosts');
    }
}
