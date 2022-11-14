<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('inventory_name');
            $table->unsignedBigInteger('player_id')->nullable();
            $table->unsignedBigInteger('guild_id')->nullable();
            $table->integer('inventory_max_size');
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('guild_id')->references('id')->on('guilds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
};
