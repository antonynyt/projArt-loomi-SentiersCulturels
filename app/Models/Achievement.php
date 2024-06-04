<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Achievement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'descr',
        'image',
        'criteria',
        'next_achievement',
    ];

    /**
     * Get the users for the achievement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get the next achievement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function next() {
        return $this->belongsTo(Achievement::class, 'next_achievement');
    }
}
