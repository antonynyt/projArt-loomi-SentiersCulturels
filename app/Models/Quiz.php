<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Poi;

class Quiz extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'poi_id',
    ];

    /**
     * Get the pois associated with the quiz.
     */
    public function pois() {
        return $this->belongsTo(Poi::class);
    }

    /**
     * Get the questions associated with the quiz.
     */
    public function questions() {
        return $this->hasMany(Question::class);
    }
}
