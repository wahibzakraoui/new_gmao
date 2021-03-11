<?php


namespace App\Actions\Kerp;


use App\Http\Requests\CreateEquipmentRequest;
use App\Models\Equipment;
use Exception;
use Illuminate\Support\Str;

/**
 * Class CreateNewEquipment
 * @package App\Actions\Kerp
 */
class CreateNewEquipment implements \App\Contracts\CreatesNewEquipment
{

    /**
     * @inheritDoc
     */
    public static function create(CreateEquipmentRequest $request)
    {
        $request->validated();
        $equipment = Equipment::create([
            'uuid' => Str::uuid(),
            'name' => $request->get('name'),
            'code' => $request->get('code'),
            'description' => $request->get('description'),
            'area_id' => $request->get('area_id'),
            'area_code' => $request->get('area_code'),
            'active' => $request->get('active') ?? false,
        ]);

        if($equipment)
        {
            if($request->hasFile('photo')){
                try {
                    $equipment->addMedia($request->file('photo'))->toMediaCollection('equipment');
                }catch (Exception $e){
                    /* don't do anything ? */
                }
            }
            return $equipment->fresh();
        }
        return null;
    }
}
