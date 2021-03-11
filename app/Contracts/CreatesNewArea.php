<?php


namespace App\Contracts;


use App\Http\Requests\CreateAreaRequest;

interface CreatesNewArea
{
    public static function create(CreateAreaRequest $request);
}
