<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTailleProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taille_produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_produit');
            $table->unsignedBigInteger('id_taille');
            $table->timestamps();

            $table->foreign('id_produit')->references('id')->on('produit')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_taille')->references('id')->on('taille')
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
        Schema::dropIfExists('taille_produits');
    }
}
