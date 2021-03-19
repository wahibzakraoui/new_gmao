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
            $table->text('code');
            $table->enum('state', ['Running', 'Offline']);
            $table->enum('type', ['visit', 'lubrification']);
            $table->enum('run_day', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'])->default('monday');
            $table->foreignId('factory_id')->nullable()->constrained();
            $table->foreignId('equipment_id')->nullable()->constrained();
            $table->foreignId('part_id')->nullable()->constrained();
            $table->foreignId('area_id')->nullable()->constrained();
            $table->foreignId('periodicity_id')->nullable()->constrained();
            $table->mediumText('work_instructions')->nullable();
            $table->decimal('estimated_hours', 25, 2)->nullable()->unsigned();
            $table->foreignId('service_id')->nullable()->constrained();
            $table->foreignId('assigned_user_id')->nullable()->constrained('users');
            $table->dateTime('next_run')->nullable();
            $table->bigInteger('runs')->nullable()->default(0)->unsigned();
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
