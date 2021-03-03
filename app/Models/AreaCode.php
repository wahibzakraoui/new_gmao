<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaCode extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'area_id'];

    public function area(){
        return $this->belongsTo(Area::class);
    }
}
