<?php


namespace App\Contracts;


use App\Http\Requests\CreateEquipmentRequest;
use App\Models\Equipment;

interface CreatesNewEquipment
{
    /**
     * @param CreateEquipmentRequest $request
     * @return Equipment|null
     * @static
     */
    public static function create(CreateEquipmentRequest $request);
}
