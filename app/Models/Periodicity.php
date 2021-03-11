<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodicity extends Model
{
    use HasFactory;
    public function gamuts(){
        return $this->hasMany(Gamut::class);
    }
}
