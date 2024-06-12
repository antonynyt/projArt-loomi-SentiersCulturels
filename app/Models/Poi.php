<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Path;
use App\Models\PoiHistory;
use App\Models\PoiFact;
use App\Models\Photo;
use App\Models\PoiFavorite;

class Poi extends Model
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
        'adress_label',
        'lat',
        'long',
        'accessibility',
    ];

    /**
     * Get the users that has visited the poi.
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the paths associated with the poi.
     */
    public function paths() {
        return $this->belongsToMany(Path::class)->withPivot('position');
    }

    /**
     * Get the poi_history for the poi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function poiHistories() {
        return $this->hasMany(PoiHistory::class);
    }

    /**
     * Get the poi_fact for the poi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function poiFacts() {
        return $this->hasMany(PoiFact::class);
    }

    /**
     * Get the audio for the poi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function audio() {
        return $this->hasMany(Audio::class);
    }

    /**
     * Get the link for the poi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function link() {
        return $this->hasMany(Link::class);
    }

    /**
     * Get the photo for the poi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos() {
        return $this->hasMany(Photo::class);
    }

    /**
     * Get the poi_favorite for the poi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function poiFavorites() {
        return $this->hasMany(PoiFavorite::class);
    }
}
