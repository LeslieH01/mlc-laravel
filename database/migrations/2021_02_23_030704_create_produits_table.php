<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('quantite');
            $table->string('seuil');
            $table->string('libelle');
            $table->string('nbr_page')->nullable();
            $table->string('format')->nullable();
            $table->longText('desc')->nullable();
            $table->float('prix_achat',6,2);
            $table->float('prix_vente',6,2);
            $table->float('prix_promo',6,2);
            $table->boolean('etat');
            $table->string('reduction');
            $table->unsignedBigInteger('id_aut');
            $table->unsignedBigInteger('id_btq');
            $table->unsignedBigInteger('id_type');
            $table->timestamps();

            $table->foreign('id_aut')->references('id')->on('auteur')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_btq')->references('id')->on('boutique')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_type')->references('id')->on('type')
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
        Schema::dropIfExists('produits');
    }
}
