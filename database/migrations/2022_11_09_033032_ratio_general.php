<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RatioGeneral extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratio_general', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('ratio_id');
        $table->unsignedBigInteger('periodo_id');
        $table->unsignedBigInteger('sector_id');
        $table->decimal('valor', 12, 2)->nullable();
        $table->foreign('ratio_id')->references('id')->on('ratio')->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('periodo_id')->references('id')->on('periodo')->onUpdate('cascade')->onDelete('cascade');
        $table->foreign('sector_id')->references('id')->on('sector')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('ratio_general');
    }
}
