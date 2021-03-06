<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GamutDraft
 *
 * @property int $id
 * @property string $equipment
 * @property string $type
 * @property string $state
 * @property string $periodicity
 * @property string $area_code
 * @property string $equipment_code
 * @property string $factory_code
 * @property string $gamut_code
 * @property int $active
 * @property int|null $estimated_hours
 * @property int|null $assigned_user_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft query()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereAreaCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereAssignedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereEquipment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereEquipmentCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereEstimatedHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereFactoryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereGamutCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft wherePeriodicity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutDraft whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GamutDraft extends Model
{
    use HasFactory;
}
