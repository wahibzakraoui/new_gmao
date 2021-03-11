<?php


namespace App\Contracts;


use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;

interface UpdatesArea
{
    /**
     * @param UpdateAreaRequest $request
     * @param Area $area
     * @return Area|null
     * @static
     */
    public static function update(UpdateAreaRequest $request, Area $area): ?Area;
}
