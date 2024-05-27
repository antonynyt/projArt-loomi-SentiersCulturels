<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;

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
        'poi_id',
    ];

    /**
     * Get the pois associated with the link.
     */
    public function pois() {
        return $this->belongsTo(Poi::class);
    }
}
