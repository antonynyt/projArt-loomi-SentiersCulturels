<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;
use App\Models\User;

class Path extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'short_descr',
        'descr',
        'duration',
        'distance',
        'ascent',
        'descent',
        'difficulty',
        'is_handicap_accessible',
        'geojson',
    ];

    /**
     * Get the pois associated with the path.
     */
    public function pois() {
        return $this->belongsToMany(Poi::class);
    }

    /**
     * Get the users that visited the path.
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
