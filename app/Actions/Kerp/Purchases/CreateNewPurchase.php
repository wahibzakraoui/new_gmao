<?php


namespace App\Actions\Kerp\Purchases;


use App\Http\Requests\CreatePurchaseRequest;
use App\Models\Purchase;
use App\Models\WorkOrder;
use Exception;
use Illuminate\Support\Str;

/**
 * Class CreateNewPurchase
 * @package App\Actions\Kerp
 */
class CreateNewPurchase
{
    public static function create(CreatePurchaseRequest $request)
    {
        $request->validated();

        $purchase = Purchase::create([
            'uuid' => Str::uuid(),
            'reference' => $request->get('reference'),
            'should_be_available_by' => $request->get('should_be_available_by'),
            'internal_note' => $request->get('internal_note'),
            'supplier_note' => $request->get('supplier_note'),
            'created_by' => Auth()->user()->id,
            'service_id' => Auth()->user()->service_id,
            'area_id' => $request->get('area_id'),
            'number_of_items' => count($request->get('quantities')),
            'work_order_id' => $request->get('work_order_id'),
        ]);

        if($purchase)
        {
            foreach($request->get('items') as $key => $item){
                $purchase->buyables()->attach($item, ['quantity_ordered' => $request->get('quantities')[$key] ]);
            }
            return $purchase->fresh();
        }
        return null;
    }
}
