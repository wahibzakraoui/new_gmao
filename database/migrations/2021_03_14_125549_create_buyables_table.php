<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->uuid('uuid')->unique();
            $table->string('code');
            $table->string('modelType');
            $table->bigInteger('modelId');
            $table->foreignId('area_id')->nullable()->constrained();
            $table->integer('equates_to')->default(1);
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
        Schema::dropIfExists('buyables');
    }
}
