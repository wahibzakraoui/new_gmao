<?php

namespace App\Models;

use App\States\WorkOrders\WorkOrderState;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\ModelStates\HasStates;

class WorkOrder extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasStates;

    protected $guarded = [];
    protected  $dates = ['objective_completion_date', 'expected_completion_date', 'real_completion_date'];
    protected $casts = [
        'status_code' => WorkOrderState::class,
    ];

    public function gamut(){
        return $this->belongsTo(Gamut::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'assigned_user_id');
    }
    public function requester(){
        return $this->belongsTo(User::class, 'requested_by');
    }
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
    public function purchase()
    {
        return $this->HasOne(Purchase::class);
    }
    public function scopeFinished($query){
        return $query->whereStatus('finished');
    }
    public function scopeBtc($query){
        return $query->where('parent_id', '!=', null);
    }
    public static function getDatatable()
    {
        return self::select([
            'work_orders.id',
            'work_orders.created_at',
            'work_orders.objective_completion_date',
            'work_orders.expected_completion_date',
            'work_orders.designation',
            'work_orders.id as number',
            'equipment.name as equipmentName',
            'gamuts.code as gamutCode',
            'users.name as userName',
            'work_orders.assigned_user_id',
            'work_orders.type',
            'work_orders.status',
            'work_orders.status_code',
            'work_orders.gamut_id',
        ])->leftJoin('equipment', 'equipment.id', '=', 'work_orders.equipment_id')
        ->leftJoin('gamuts', 'gamuts.id', '=', 'work_orders.gamut_id')
        ->leftJoin('services', 'services.id', '=', 'work_orders.service_id')
        ->leftJoin('users', 'users.id', '=', 'work_orders.assigned_user_id');
    }
}
