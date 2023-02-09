<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('heure');
            $table->boolean('etat');
            $table->unsignedBigInteger('id_cmd');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

            $table->foreign('id_cmd')->references('id')->on('commande')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_user')->references('id_user')->on('User')
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
        Schema::dropIfExists('livraisons');
    }
}
