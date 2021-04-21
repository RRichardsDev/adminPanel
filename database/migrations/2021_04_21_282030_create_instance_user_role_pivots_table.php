<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstanceUserRolePivotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instance_user_role_pivots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instance_id')->references('id')->on('contour_instances');
            $table->foreignId('user_id')->references('id')->on('contour_users');
            $table->foreignId('role_id')->references('id')->on('contour_roles');
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
        Schema::dropIfExists('instance_user_role_pivots');
    }
}
