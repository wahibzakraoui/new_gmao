<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Factory
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $code
 * @property string $description
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Factory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Factory query()
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Factory whereUuid($value)
 * @mixin \Eloquent
 */
class Factory extends Model
{
    protected $guarded = [];
}
