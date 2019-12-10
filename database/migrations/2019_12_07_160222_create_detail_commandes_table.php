<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('plat_id');
            $table->foreign('plat_id')
                ->references('id')
                ->on('plats');
            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id')
                ->references('id')
                ->on('commandes');
            $table->integer('quantite');
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
        Schema::dropIfExists('detail_commandes');
    }
}
