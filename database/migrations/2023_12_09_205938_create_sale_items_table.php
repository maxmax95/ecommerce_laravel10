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
        Schema::enableForeignKeyConstraints();
        Schema::create('sale_items', function (Blueprint $table) {
            $table->unsignedBigInteger('id_sale');
            $table->foreign('id_sale')->references('id')->on('sales')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            
            $table->integer('qty');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sale_items');
        Schema::enableForeignKeyConstraints();
    }
};
