<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->timestamp('mailVerifiedAt')->nullable();
            $table->string('password');

            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
};
