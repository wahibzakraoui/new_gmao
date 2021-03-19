<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('reference');
            $table->date('should_be_available_by');
            $table->date('expected_delivery_date')->nullable();
            $table->date('actual_delivery_date')->nullable();
            $table->foreignId('work_order_id')->nullable()->constrained();
            $table->foreignId('created_by')->constrained('users');
            $table->foreignId('received_by')->nullable()->constrained('users');
            $table->foreignId('supplier_id')->nullable()->constrained();
            $table->foreignId('area_id')->nullable()->constrained();
            $table->foreignId('service_id')->nullable()->constrained();
            $table->integer('number_of_items');
            $table->integer('subtotal_in_cents')->nullable();
            $table->integer('tax_total_in_cents')->nullable();
            $table->integer('transportation_fees_in_cents')->nullable();
            $table->integer('importation_fees_in_cents')->nullable();
            $table->integer('discounted_amount_in_cents')->nullable();
            $table->integer('total_amount_in_cents')->nullable();
            $table->mediumText('internal_note')->nullable();
            $table->mediumText('supplier_note')->nullable();
            $table->foreignId('reviewed_by')->nullable()->constrained('users');
            $table->date('review_date')->nullable();
            $table->mediumText('review_reason')->nullable();
            $table->string('state')->default('pending');
            $table->string('fulfillment')->default('pending');
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
        Schema::dropIfExists('purchases');
    }
}
