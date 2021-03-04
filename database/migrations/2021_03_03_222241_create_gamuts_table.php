<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamuts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->string('designation', 255);
            $table->uuid('uuid')->unique();
            $table->text('code', 160);
            $table->enum('state', ['Running', 'Offline']);
            $table->enum('type', ['visit', 'lubrification']);
            $table->mediumInteger('factory_id')->nullable()->unsigned();
            $table->mediumInteger('equipment_id')->nullable()->unsigned();
            $table->mediumInteger('part_id')->nullable()->unsigned();
            $table->mediumInteger('area_id')->nullable()->unsigned();
            $table->unsignedBigInteger('periodicity_id')->nullable();
            $table->foreign('periodicity_id')->references('id')->on('periodicities');
            $table->mediumText('work_instructions')->nullable();
            $table->decimal('estimated_hours', 25, 2)->nullable()->unsigned();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services');
            $table->mediumInteger('assigned_user_id')->nullable()->unsigned();
            $table->dateTime('next_run')->nullable();
            $table->mediumInteger('runs')->nullable()->default(0)->unsigned();
            $table->boolean('active')->nullable()->default(true);
            $table->softDeletes();
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
        Schema::dropIfExists('gamuts');
    }
}
