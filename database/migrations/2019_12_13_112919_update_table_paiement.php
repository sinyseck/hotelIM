<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTablePaiement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paiements', function (Blueprint $table) {
            $table->unsignedBigInteger('reservation_id')->nullable();
            $table->foreign('reservation_id')
                ->references('id')
                ->on('reservations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paiements', function (Blueprint $table) {
            $table->dropForeign('paiements_reservation_id_foreign');
            $table->removeColumn('reservation_id');
        });
    }
}
