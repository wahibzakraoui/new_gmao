<?php


namespace App\Actions\Kerp;


use App\Contracts\UpdatesArea;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use App\Models\AreaCode;

class UpdateArea implements UpdatesArea
{

    public static function update(UpdateAreaRequest $request, Area $area) : ?Area
    {
        $request->validated();
        if ($area->update([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'factory_id' => $request->get('factory_id'),
            'active' => $request->get('active') ?: null,
        ])) {
            $area->codes()->delete();
            collect($request->get('codes'))->each(function ($code) use ($area) {
                $id = $area->id;
                $code = ['area_id' => $id, 'code' => $code];
                AreaCode::create($code);
            });
            return $area->fresh();
        }
        return null;
    }
}
