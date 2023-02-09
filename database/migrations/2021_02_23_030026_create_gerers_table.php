<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gerers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_btq');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('User')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_btq')->references('id')->on('boutique')
            ->onDelete('restrict')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gerers');
    }
}
