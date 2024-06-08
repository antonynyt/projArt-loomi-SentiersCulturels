<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Poi;
use App\Models\Path;
use App\Models\Review;
use App\Models\PoiHistory;
use App\Models\PathHistory;
use App\Models\Achievement;
use App\Models\PoiFavorite;
use App\Models\PathFavorite;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pseudo',
        'organization',
        'firstname',
        'lastname',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasRole($role){
        return $this->roles->where('role',$role)->count() > 0;
    }

    public function hasAnyRole($roles){
        foreach($roles as $role){
            if($this->hasRole($role)){
                return true;
             }
         }
         return false;
    }

    /**
     * Get the roles associated with the user.
     */
    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get the pois visited by the user.
     */
    public function pois() {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get the paths visited by the user.
     */
    public function paths() {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get the reviews written by the user.
     */
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the poi_histories for the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function poiHistories() {
        return $this->hasMany(PoiHistory::class);
    }

    /**
     * Get the path_histories for the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pathHistories() {
        return $this->hasMany(PathHistory::class);
    }

    /**
     * Get the achievements for the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getAchievements() {
        return $this->hasMany(Achievement::class);
    }

    /**
     * Get the poi_favorite for the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function poiFavorites() {
        return $this->hasMany(PoiFavorite::class);
    }

    /**
     * Get the path_favorite for the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pathFavorites() {
        return $this->hasMany(PathFavorite::class);
    }

}
