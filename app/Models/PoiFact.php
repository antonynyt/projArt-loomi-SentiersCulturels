<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;

class PoiFact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'poi_id',
    ];

    /**
     * Get the poi that owns the poi_fact
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pois() {
        return $this->belongsTo(Poi::class);
    }
}
