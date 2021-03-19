<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationBuyableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_buyable', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->constrained();
            $table->foreignId('buyable_id')->constrained();
            $table->decimal('quantity_ordered');
            $table->integer('unit_price_in_cents')->nullable();
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
        Schema::dropIfExists('quotation_buyable');
    }
}
