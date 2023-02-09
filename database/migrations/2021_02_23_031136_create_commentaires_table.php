<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('heure');
            $table->longText('comment');
            $table->string('note');
            $table->boolean('etat');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_produit');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('User')
            ->onDelete('restrict')
            ->onUpdate('cascade');

            $table->foreign('id_produit')->references('id')->on('produit')
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
        Schema::dropIfExists('commentaires');
    }
}
