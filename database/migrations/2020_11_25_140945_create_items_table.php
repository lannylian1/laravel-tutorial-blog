<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
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
            $table->string('category_id', 50)->unique();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->double('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('sku')->nullable();
            $table->timestamps();

            $table->unique(['category_id','sku']);
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
}
