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
        Schema::disableForeignKeyConstraints();
        Schema::create('users_contacts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('adress');
            $table->integer('number');
            $table->integer('postalCode')->digits(8);
            $table->string('references');
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
        Schema::dropIfExists('users_contacts');
        Schema::enableForeignKeyConstraints();
    }
};
