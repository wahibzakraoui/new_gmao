<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Buyable extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function model(){
        return $this->belongsTo($this->modelType, 'modelId');
    }

    public static function getList(){
        return self::select([DB::raw("CONCAT(name,' - ',code) AS name"),'id'])->pluck('name', 'id');
    }
}
