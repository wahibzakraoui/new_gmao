<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;
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
    public static function getDatatable()
    {
        return self::select([
            'work_orders.id',
            'work_orders.created_at',
            'work_orders.designation',
            'work_orders.id as number',
            'equipment.name as equipmentName',
            'gamuts.code as gamutCode',
            'users.name as userName',
            'work_orders.assigned_user_id',
            'work_orders.type',
            'work_orders.status',
            'work_orders.gamut_id',
        ])->leftJoin('equipment', 'equipment.id', '=', 'work_orders.equipment_id')
        ->leftJoin('gamuts', 'gamuts.id', '=', 'work_orders.gamut_id')
        ->leftJoin('services', 'services.id', '=', 'work_orders.service_id')
        ->leftJoin('users', 'users.id', '=', 'work_orders.assigned_user_id');
    }
}
