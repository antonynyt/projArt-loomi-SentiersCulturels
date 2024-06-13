<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;
use App\Models\User;
use App\Models\Theme;
use App\Models\Review;
use App\Models\PathHistory;
use App\Models\PathFavorite;
use App\Models\Link;

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
        'descr',
        'duration',
        'distance',
        'ascent',
        'descent',
        'difficulty',
        'is_handicap_accessible',
        'is_loop',
        'geojson',
        'user_id',
    ];

    /**
     * Get the pois associated with the path.
     */
    public function pois() {
        return $this->belongsToMany(Poi::class)->withPivot('position');
    }

    /**
     * Get the users that visited the path.
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the themes for the path
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function themes() {
        return $this->belongsTo(Theme::class);
    }

    /**
     * Get the reviews for the path
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the path_histories for the path
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pathHistories() {
        return $this->hasMany(PathHistory::class);
    }

    /**
     * Get the path_favorite for the path
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pathFavorites() {
        return $this->hasMany(PathFavorite::class);
    }

    /**
     * Get the links for the path
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function links() {
        return $this->hasMany(Link::class);
    }

    /**
     * Get the user that created the path
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
