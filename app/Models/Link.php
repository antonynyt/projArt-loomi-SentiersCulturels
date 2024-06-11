<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;
use App\Models\Path;

class Link extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'url',
        'type',
        'poi_id',
        'path_id',
    ];

    /**
     * Get the pois associated with the link.
     */
    public function pois() {
        return $this->belongsTo(Poi::class);
    }

    /**
     * Get the paths associated with the link.
     */
    public function paths() {
        return $this->belongsTo(Path::class);
    }
}
