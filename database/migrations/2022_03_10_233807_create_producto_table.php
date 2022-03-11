<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class  CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Producto', function (Blueprint $table) {
            $table->bigIncrements('id_producto');
            $table->string ('nombre', 45);
            $table->string('descripcion',45);
            $table->decimal('precio');
            $table->bigInteger('id_marca')->unsigned()->nullable();
            $table->foreign('id_marca','fk_Productos')->references('id')->on('Marca');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Producto');
    }
}
