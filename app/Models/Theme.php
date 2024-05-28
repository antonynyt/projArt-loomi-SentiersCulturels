<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Path;

class Theme extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'descr',
        'icon',
    ];

    /**
     * Get the paths for the theme
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paths() {
        return $this->hasMany(Path::class);
    }
}
