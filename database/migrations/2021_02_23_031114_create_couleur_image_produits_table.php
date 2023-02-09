<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouleurImageProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couleur_image_produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_produit');
            $table->unsignedBigInteger('id_image');
            $table->unsignedBigInteger('id_couleur');
            $table->timestamps();

            $table->foreign('id_produit')->references('id')->on('produit')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_image')->references('id')->on('image')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_couleur')->references('id')->on('couleur')
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
        Schema::dropIfExists('couleur_image_produits');
    }
}
