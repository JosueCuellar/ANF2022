<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_empresa', function (Blueprint $table) {
            $table->unsignedBigInteger('id_cuenta');
            $table->foreign('id_cuenta')->references('id')->on('cuenta')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_cuenta_sistema');
            $table->foreign('id_cuenta_sistema')->references('id')->on('cuenta_equivalente')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresa')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            //$table->primary(['id_cuenta', 'id_cuenta_sistema', 'id_empresa']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuenta_empresa');
    }
}
