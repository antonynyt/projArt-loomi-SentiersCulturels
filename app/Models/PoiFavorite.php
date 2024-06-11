<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;
use App\Models\User;

class PoiFavorite extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['poi_id', 'user_id'];

    /**
     * Get the poi that owns the favorite.
     */
    public function pois()
    {
        return $this->belongsTo(Poi::class);
    }

    /**
     * Get the user that owns the favorite.
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
