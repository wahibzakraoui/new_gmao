<?php


namespace App\Services;


use App\Models\Quotation;

class QuotationService
{
    private $quotation;
    public function __construct(Quotation $quotation)
    {
        $this->quotation = $quotation;
    }

    public function syncPricing(){
        $this->quotation->buyables->map(function($buyable){
            $this->quotation->subtotal_in_cents += $buyable->pivot->quantity_ordered * $buyable->pivot->unit_price_in_cents;
        });
        $this->quotation->tax_total_in_cents = $this->quotation->subtotal_in_cents * 0.2;
        $this->quotation->total_amount_in_cents =
            ($this->quotation->subtotal_in_cents +
            $this->quotation->tax_total_in_cents +
            $this->quotation->transportation_fees_in_cents +
            $this->quotation->importation_fees_in_cents) -
            $this->quotation->discounted_amount_in_cents;

        $this->quotation->save();
    }
}
