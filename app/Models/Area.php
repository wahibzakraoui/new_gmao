<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Area
 *
 * @property int $id
 * @property string $name
 * @property string $uuid
 * @property string $description
 * @property int $active
 * @property int $factory_id
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|AreaCode[] $codes
 * @property-read int|null $codes_count
 * @property-read Collection|Equipment[] $equipments
 * @property-read int|null $equipments_count
 * @method static Builder|Area newModelQuery()
 * @method static Builder|Area newQuery()
 * @method static Builder|Area query()
 * @method static Builder|Area whereActive($value)
 * @method static Builder|Area whereCreatedAt($value)
 * @method static Builder|Area whereDeletedAt($value)
 * @method static Builder|Area whereDescription($value)
 * @method static Builder|Area whereFactoryId($value)
 * @method static Builder|Area whereId($value)
 * @method static Builder|Area whereName($value)
 * @method static Builder|Area whereUpdatedAt($value)
 * @method static Builder|Area whereUuid($value)
 * @mixin Eloquent
 */
class Area extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function codes(): HasMany
    {
        return $this->hasMany(AreaCode::class);
    }

    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }
}
