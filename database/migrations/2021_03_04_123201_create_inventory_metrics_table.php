<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryMetricsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('inventory_metrics', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('symbol');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('restrict')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('inventory_metrics');
    }
}
