<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('iduser')->unsigned();
            $table->bigInteger('idcategoria')->unsigned();
            $table->string('nombre', 80);
            $table->text('descripcion')->nullable();
            $table->string('uso', 30);
            $table->decimal('precio', 6,2);
            $table->date('fecha');
            $table->string('estado',50);
            $table->longtext('foto')->nullable();
            
            $table->timestamps();
            
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idcategoria')->references('id')->on('categoria')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
