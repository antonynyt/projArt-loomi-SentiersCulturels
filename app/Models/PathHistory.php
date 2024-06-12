<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Path;
use App\Models\User;

class PathHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'path_id',
        'user_id',
    ];

    /**
     * Get the path that owns the path_history
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paths()
    {
        return $this->belongsTo(Path::class);
    }

    /**
     * Get the user that owns the path_history
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public static function getPopularPaths()
    {
        return self::select('path_id', \DB::raw('COUNT(*) as completions'))
            ->groupBy('path_id')
            ->orderBy('completions', 'desc')
            ->get();
    }

    public static function popular()
    {
        // Récupérer les chemins et les trier par nombre de fois complétés
        return Path::withCount('pathHistories')
            ->orderByDesc('path_histories_count')
            ->get();
    }
}
