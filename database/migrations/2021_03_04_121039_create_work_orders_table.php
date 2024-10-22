<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->uuid('uuid')->unique();
            $table->integer('parent_id')->nullable()->unsigned();
            $table->mediumText('designation')->nullable();
            $table->mediumText('description')->nullable();
            $table->foreignId('equipment_id')->nullable()->constrained();
            $table->foreignId('part_id')->nullable()->constrained();
            $table->foreignId('gamut_id')->nullable()->constrained();
            $table->foreignId('service_id')->nullable()->constrained();
            $table->foreignId('assigned_user_id')->nullable()->constrained('users');
            $table->foreignId('approved_by')->nullable()->constrained('users');
            $table->foreignId('requested_by')->nullable()->constrained('users');
            $table->decimal('expected_duration_in_hours')->default(8);
            $table->dateTime('objective_completion_date')->nullable();
            $table->dateTime('expected_completion_date')->nullable();
            $table->dateTime('real_completion_date')->nullable();
            $table->mediumText('feedback')->nullable();
            $table->set('type', ['gamut', 'complementary_wo', 'corrective_maintenance']);
            $table->set('status', ['pending', 'assigned', 'finished_with_remarks','finished']);
            $table->boolean('done')->nullable()->default(false);
            $table->string('status_code')->default('64-RDY ');
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
        Schema::dropIfExists('work_orders');
    }
}
