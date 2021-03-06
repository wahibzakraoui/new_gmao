<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AreaCode
 *
 * @property int $id
 * @property int $area_id
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Area $area
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AreaCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AreaCode extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'area_id'];

    public function area(){
        return $this->belongsTo(Area::class);
    }
}
