<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accesses', function (Blueprint $table) {
            $table->bigIncrements("access_id");
            $table->bigInteger("role_id")->unsigned();
            $table->bigInteger("action_id")->unsigned();
            $table->timestamps();

            $table->foreign("role_id")->references("role_id")->on("roles");
            $table->foreign("action_id")->references("action_id")->on("actions");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accesses');
    }
}
