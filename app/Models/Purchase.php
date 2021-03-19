<?php

namespace App\Models;

use App\States\Fulfillment\FulfillmentState;
use App\States\Purchases\PurchaseState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;


class Purchase extends Model
{
    use HasFactory;
    use HasStates;

    protected $guarded =  [];
    protected $casts = [
        'state' => PurchaseState::class,
        'fulfillment' => FulfillmentState::class,
    ];
    protected $dates = ['should_be_available_by'];

    public function buyables()
    {
        return $this->belongsToMany(Buyable::class, 'purchase_buyable')->withPivot('quantity_ordered', 'unit_price_in_cents');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function work_order()
    {
        return $this->belongsTo(WorkOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'received_by');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }


    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

}
