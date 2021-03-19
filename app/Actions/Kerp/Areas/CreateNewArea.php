<?php


namespace App\Actions\Kerp\Areas;

use App\Contracts\CreatesNewArea;
use App\Http\Requests\Areas\CreateAreaRequest;
use App\Models\Area;
use App\Models\AreaCode;
use Illuminate\Support\Str;

class CreateNewArea implements CreatesNewArea
{
    public static function create(CreateAreaRequest $request)
    {
        $request->validated();
        $area = Area::create([
            'uuid' => Str::uuid(),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'factory_id' => $request->get('factory_id'),
            'active' => $request->get('active') ?? false,
        ]);

        if ($area) {
            collect($request->get('codes'))->each(function ($code) use ($area) {
                $id = $area->id;
                $code = ['area_id' => $id, 'code' => $code];
                AreaCode::create($code);
            });
            return $area;
        }
        return null;
    }
}
