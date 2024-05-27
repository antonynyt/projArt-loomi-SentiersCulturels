<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;

class Audio extends Model
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
        'src_link',
        'author',
        'date',
        'lang',
        'poi_id',
    ];

    /**
     * Get the pois associated with the audio.
     */
    public function pois() {
        return $this->belongsTo(Poi::class);
    }
}
