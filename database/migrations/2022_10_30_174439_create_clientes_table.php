<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function(Blueprint $table){
            $table->id();
            $table ->string('slug',100)->unique();
            $table->string('nombre');
            $table->date('fechaNac');
            $table->string('dui',10)->unique();
            $table->string('telefono',20);
            $table->string('correo');
            $table->string('direccion')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
