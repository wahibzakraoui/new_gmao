<?php


namespace App\Actions\Kerp\Equipment;


use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Equipment;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class UpdateEquipment implements \App\Contracts\UpdatesEquipment
{

    /**
     * @inheritDoc
     */
    public static function update(UpdateEquipmentRequest $request, Equipment $equipment): ?Equipment
    {
        $request->validated();
        if($equipment->update(
            [
                'name' => $request->get('name'),
                'code' => $request->get('code'),
                'description' => $request->get('description'),
                'area_id' => $request->get('area_id'),
                'area_code' => $request->get('area_code'),
                'active' => $request->get('active') ?? false,
            ]
        ))
        {
            if($request->hasFile('photo')){
                $equipment->clearMediaCollection('equipment');
                try {
                    $equipment->addMedia($request->file('photo'))
                        ->toMediaCollection('equipment');
                } catch (\Exception $e) {
                    /* Do nothing? */
                }
            }
            return $equipment;
        }
        return null;
    }
}
