<?php


namespace App\Contracts;


use App\Http\Requests\Areas\CreateAreaRequest;

interface CreatesNewArea
{
    public static function create(CreateAreaRequest $request);
}
