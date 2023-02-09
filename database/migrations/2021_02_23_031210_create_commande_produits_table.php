<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->heure('heure');
            $table->unsignedBigInteger('id_produit');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_cmd');
            $table->timestamps();

            $table->foreign('id_produit')->references('id')->on('produit')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_user')->references('id')->on('User')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_cmd')->references('id')->on('commande')
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
        Schema::dropIfExists('commande_produits');
    }
}
