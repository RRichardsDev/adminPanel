<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClientUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_user', function (Blueprint $table) {
            $table->foreignId('client_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('permission_role_id')->defualt(0);
            $table->foreign('permission_role_id')->references('role_id')->on('permission_roles');
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
         Schema::dropIfExists('client_user');
    }
}