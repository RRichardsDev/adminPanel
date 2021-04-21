<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContourRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contour_roles', function (Blueprint $table) {
             $table->id();
            $table->string('name'); //Admin, Team Leader, Basic user
        //Permissions
            $table->boolean('p_1'); //Upload data
            $table->boolean('p_2'); //Edit files
            $table->boolean('p_3'); //Pull data
            $table->boolean('p_4'); //etc......
            $table->boolean('p_5');
            $table->boolean('p_6');
            $table->boolean('p_7');
            $table->boolean('p_8');
            $table->boolean('p_9');
            $table->boolean('p_10');
            $table->boolean('p_11');
            $table->boolean('p_12');
            $table->boolean('p_13');
            $table->boolean('p_14');
            $table->boolean('p_15');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contour_roles');
    }
}
