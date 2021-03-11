<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WorkOrder
 *
 * @property int $id
 * @property string $uuid
 * @property int|null $parent_id
 * @property string|null $designation
 * @property string|null $description
 * @property int|null $equipment_id
 * @property int|null $part_id
 * @property int|null $gamut_id
 * @property mixed $type
 * @property int|null $assigned_user_id
 * @property int|null $approved_by
 * @property int|null $requested_by
 * @property string|null $deadline
 * @property mixed $status
 * @property string|null $date_completed
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereApprovedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereAssignedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereDateCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereDesignation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereEquipmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereGamutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder wherePartId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereRequestedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkOrder whereUuid($value)
 * @mixin \Eloquent
 */
class WorkOrder extends Model
{
    use HasFactory;
    private $service_id;
    protected $guarded = [];

    public function gamut(){
        return $this->belongsTo(Gamut::class);
    }
    public function scopeFinished($query){
        return $query->whereStatus('finished');
    }
    public function scopeBtc($query){
        return $query->where('parent_id', '!=', null);
    }
}
