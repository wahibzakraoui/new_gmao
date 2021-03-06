<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Periodicity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $code
 * @property string $unit
 * @property float $frequency
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Gamut[] $gamuts
 * @property-read int|null $gamuts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodicity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Periodicity extends Model
{
    use HasFactory;
    public function gamuts(){
        return $this->hasMany(Gamut::class);
    }
}
