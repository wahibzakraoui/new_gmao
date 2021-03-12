<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urgency extends Model
{
    use HasFactory;

    public static function getList(){
        return self::all()->pluck('localized_name_key', 'id')->map(function($each){
            return __('lang.'.$each);
        });
    }
}
