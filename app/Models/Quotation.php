<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['expected_delivery_date'];

    public function buyables()
    {
        return $this->belongsToMany(Buyable::class, 'quotation_buyable')->withPivot('quantity_ordered', 'unit_price_in_cents');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }
}
