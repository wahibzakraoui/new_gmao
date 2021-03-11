<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

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
