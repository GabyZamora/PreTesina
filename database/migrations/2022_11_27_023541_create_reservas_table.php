<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table ->date('checkin');
            $table ->date('checkout');
            $table ->boolean('estado')->default(0);
            $table ->decimal('preciototal', 7,2);
            $table ->string('numHuesped', 2);
            $table ->boolean('mascotas')->default(0);
            $table ->foreignId('estado_id')->constrained();
            $table ->foreignId('lugar_id')->constrained();
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
        //
    }
}
