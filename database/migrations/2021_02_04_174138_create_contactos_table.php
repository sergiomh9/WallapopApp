<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto', function (Blueprint $table) {
            $table->id();
            
            
            $table->bigInteger('iduser1')->unsigned();
            $table->bigInteger('iduser2')->unsigned();
            $table->bigInteger('idproducto')->unsigned();
            $table->text('textocontacto')->nullable();
            
            $table->timestamps();
            
            
            $table->foreign('iduser1')->references('id')->on('users');
            $table->foreign('iduser2')->references('id')->on('users');
            $table->foreign('idproducto')->references('id')->on('productos');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacto');
    }
}
