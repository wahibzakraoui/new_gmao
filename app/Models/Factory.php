<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{
    protected $guarded = [];

    public function areas(){
        return $this->hasMany(Area::class);
    }
}
