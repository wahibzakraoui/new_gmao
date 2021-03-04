<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodicitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodicities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 160);
            $table->mediumText('description');
            $table->string('code', 60);
            $table->enum('unit', ['minute', 'hour', 'day',  'week', 'month', 'year']);
            $table->double('frequency', 25, 2);
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
        Schema::dropIfExists('periodicities');
    }
}
