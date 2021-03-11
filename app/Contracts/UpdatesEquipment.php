<?php


namespace App\Contracts;


use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Equipment;

interface UpdatesEquipment
{
    /**
     * @param UpdateEquipmentRequest $request
     * @param Equipment $equipment
     * @return Equipment|null
     */
    public static function update(UpdateEquipmentRequest $request, Equipment $equipment): ?Equipment;
}
