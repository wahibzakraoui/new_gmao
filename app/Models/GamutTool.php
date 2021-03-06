<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GamutTool
 *
 * @property int $id
 * @property int|null $gamut_id
 * @property int|null $tool_id
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool query()
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereGamutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereToolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GamutTool whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GamutTool extends Model
{
    use HasFactory;
}
