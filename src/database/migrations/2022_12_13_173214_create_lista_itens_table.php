<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_itens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lista_id');
            $table->unsignedBigInteger('compra_id');
            $table->timestamps();

            $table->foreign('lista_id')->references('id')->on('listas');
            $table->foreign('compra_id')->references('id')->on('compras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_itens');
    }
};
