<?php /** @noinspection PhpMissingFieldTypeInspection */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Gamut extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['next_run'];

    /**
     * @return BelongsTo
     */
    public function periodicity(): BelongsTo
    {
        return $this->belongsTo(Periodicity::class);
    }

    /**
     * @return HasMany
     */
    public function work_orders(): HasMany
    {
        return $this->hasMany(WorkOrder::class);
    }

    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * @return BelongsTo
     */
    public function factory(): BelongsTo
    {
        return $this->belongsTo(Factory::class);
    }

    /**
     * @return BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * @return BelongsTo
     */
    public function equipment(): BelongsTo
    {
        return $this->belongsTo(Equipment::class);
    }

    public function done(){
        return $this->hasMany(WorkOrder::class)->finished();
    }

    public function btcs(){
        return $this->hasMany(WorkOrder::class)->btc();
    }

}
