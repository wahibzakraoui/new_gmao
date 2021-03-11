<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Equipment
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $code
 * @property string $description
 * @property int $active
 * @property int $area_id
 * @property string $area_code
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Area $area
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Equipment whereUuid($value)
 * @mixin \Eloquent
 */
class Equipment extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $guarded = [];

    public function area(){
        return $this->belongsTo(Area::class);
    }
    public function gamuts(){
        return $this->hasMany(Gamut::class);
    }

    public static function getList(){
        return self::select([DB::raw("CONCAT(name,' - ',code) AS name"),'id'])->pluck('name', 'id');
    }
}
