<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;

class Photo extends Model
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
        'author',
        'date',
        'link',
    ];

    /**
     * Get the pois associated with the photo.
     */
    public function pois() {
        return $this->belongsTo(Poi::class);
    }
}
