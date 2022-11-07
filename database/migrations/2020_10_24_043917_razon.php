<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Razon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('razon', function (Blueprint $table) {
            $table->id();
            $table->decimal('double')->nullable();
            $table->unsignedBigInteger('parametro_id');
            $table->foreign('parametro_id')->references('id')->on('ratio')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('periodo_id');
            $table->foreign('periodo_id')->references('id')->on('periodo')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('razon');
    }
}
