<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamutDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamut_drafts', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned()->index();
            $table->string('equipment', 160);
            $table->string('type', 160);
            $table->string('state', 160);
            $table->string('periodicity', 160);
            $table->string('area_code', 160);
            $table->string('equipment_code', 160);
            $table->string('factory_code', 160);
            $table->string('gamut_code', 160);
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('gamut_drafts');
    }
}
