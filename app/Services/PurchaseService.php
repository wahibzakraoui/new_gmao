<?php


namespace App\Services;


use App\Models\Quotation;
use App\States\Purchases\Ordered;

class PurchaseService
{
    private $quote;
    private $purchase;
    public function __construct(Quotation $quote)
    {
        $this->quote = $quote;
        $this->purchase = $quote->purchase;
    }
    public function setSelected()
    {
        $this->purchase->buyables()->detach();
        $this->purchase->expected_delivery_date = $this->quote->expected_delivery_date;
        $this->purchase->supplier_id = $this->quote->supplier_id;
        $this->purchase->subtotal_in_cents = $this->quote->subtotal_in_cents;
        $this->purchase->tax_total_in_cents = $this->quote->tax_total_in_cents;
        $this->purchase->transportation_fees_in_cents = $this->quote->transportation_fees_in_cents;
        $this->purchase->importation_fees_in_cents = $this->quote->importation_fees_in_cents;
        $this->purchase->discounted_amount_in_cents = $this->quote->discounted_amount_in_cents;
        $this->purchase->total_amount_in_cents = $this->quote->total_amount_in_cents;

        $this->purchase->state->transitionTo(Ordered::class);
        $this->purchase->save();

        $this->quote->state = "selected";
        $this->quote->save();

        return $this->attachBuyables();
    }

    private function attachBuyables()
    {
        foreach ($this->quote->buyables as $buyable){
            $this->purchase->buyables()->attach($buyable->pivot->buyable_id, ['quantity_ordered' => $buyable->pivot->quantity_ordered, 'unit_price_in_cents' =>  $buyable->pivot->unit_price_in_cents]);
        }
        return true;
    }
}
