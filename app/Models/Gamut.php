<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Gamut
 *
 * @property int $id
 * @property string $designation
 * @property string $uuid
 * @property string $code
 * @property string $state
 * @property string $type
 * @property int|null $factory_id
 * @property int|null $equipment_id
 * @property int|null $part_id
 * @property int|null $area_id
 * @property int|null $periodicity_id
 * @property string|null $work_instructions
 * @property string|null $estimated_hours
 * @property int|null $service_id
 * @property int|null $assigned_user_id
 * @property string|null $next_run
 * @property int|null $runs
 * @property int|null $active
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Periodicity|null $periodicity
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereAssignedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereEstimatedHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereFactoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereNextRun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut wherePartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut wherePeriodicityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereRuns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gamut whereWorkInstructions($value)
 * @mixin \Eloquent
 */
class Gamut extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function periodicity(){
        return $this->belongsTo(Periodicity::class);
    }
}
