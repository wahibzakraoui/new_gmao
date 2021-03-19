<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function codes(): HasMany
    {
        return $this->hasMany(AreaCode::class);
    }

    public function factory(){
        return $this->belongsTo(Factory::class);
    }

    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class);
    }

    public function parts(): HasMany
    {
        return $this->hasMany(Part::class);
    }
    public function gamuts(): HasMany
    {
        return $this->hasMany(Gamut::class);
    }
}
