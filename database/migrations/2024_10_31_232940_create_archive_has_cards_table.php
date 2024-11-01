<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchiveHasCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archive_has_cards', function (Blueprint $table) {
            $table->unsignedBigInteger('card_fk');
            $table->foreign('card_fk')->references('id')->on('cards')->onDelete('cascade');

            $table->unsignedBigInteger('archive_fk');
            $table->foreign('archive_fk')->references('id')->on('archives')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archive_has_cards');
    }
}
