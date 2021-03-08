<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Part
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $code
 * @property string|null $complementary_code
 * @property int|null $area_id
 * @property string $area_code
 * @property int|null $equipment_id
 * @property string $equipment_code
 * @property int|null $criticity_id
 * @property int $active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Part newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Part newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Part query()
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereComplementaryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereCriticityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereEquipmentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Part whereUuid($value)
 * @mixin \Eloquent
 */
class Part extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $guarded = [];
    public function area(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Area::class);
    }
}
