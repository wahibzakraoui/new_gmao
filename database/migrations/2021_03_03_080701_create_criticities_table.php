<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriticitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criticities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 160);
            $table->uuid('uuid')->unique();
            $table->string('code', 60);
            $table->mediumText('description');
            $table->set('type', [0, 1, 2, 3, 4, 5]);
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
        Schema::dropIfExists('criticities');
    }
}
