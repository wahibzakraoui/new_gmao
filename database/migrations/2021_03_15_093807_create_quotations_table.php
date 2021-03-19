<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->string('quotation_reference');
            $table->date('expected_delivery_date')->nullable();
            $table->integer('number_of_items');
            $table->integer('subtotal_in_cents')->nullable();
            $table->integer('tax_total_in_cents')->nullable();
            $table->integer('transportation_fees_in_cents')->nullable();
            $table->integer('importation_fees_in_cents')->nullable();
            $table->integer('discounted_amount_in_cents')->nullable();
            $table->integer('total_amount_in_cents')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->enum('state', ['quoted', 'canceled','selected']);
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
        Schema::dropIfExists('quotations');
    }
}
