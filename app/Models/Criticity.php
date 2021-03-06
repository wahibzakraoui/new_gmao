<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Criticity
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $code
 * @property string $description
 * @property mixed $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Criticity whereUuid($value)
 * @mixin \Eloquent
 */
class Criticity extends Model
{
    use HasFactory;
}
