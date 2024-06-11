<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;
use App\Models\User;

class PoiHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'poi_id',
        'user_id',
    ];

    /**
     * Get the poi that owns the poi_history
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pois() {
        return $this->belongsTo(Poi::class);
    }

    /**
     * Get the user that owns the poi_history
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users() {
        return $this->belongsTo(User::class);
    }
}
