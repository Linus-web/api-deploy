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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_id');
            $table->unsignedBigInteger('armor_id')->nullable();
            $table->unsignedBigInteger('weapon_id')->nullable();
            $table->unsignedBigInteger('jewellery_id')->nullable();
            $table->timestamps();

            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->foreign('armor_id')->references('id')->on('armors');
            $table->foreign('weapon_id')->references('id')->on('weapons');
            $table->foreign('jewellery_id')->references('id')->on('jewelleries');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
