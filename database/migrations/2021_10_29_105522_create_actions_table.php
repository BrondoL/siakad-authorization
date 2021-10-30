<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->bigIncrements("action_id");
            $table->string("action")->unique();
            $table->string("url")->unique();
            $table->integer("is_active")->unsigned()->default(1);
            $table->bigInteger("menu_id")->unsigned();
            $table->timestamps();

            $table->foreign("menu_id")->references("menu_id")->on("menus");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
