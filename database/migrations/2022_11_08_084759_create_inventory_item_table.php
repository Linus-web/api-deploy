<?php

use App\Models\Inventory;
use App\Models\Item;
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
        Schema::create('inventory_item', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Inventory::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Item::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->index('inventory_id')->references('id')->on('inventories');
            $table->index('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory_item');
    }
};
