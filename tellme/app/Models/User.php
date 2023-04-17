<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'telephone',
        'email',
        'password',
        'summary',
        'type',
    ];
    // public function scopeFilter($query, array $filter)
    // {
    //     if ($filter['users'] ?? false) {
    //         $query->where('first_name', 'like', '%' . request('users') . '%')
    //             ->orWhere('last_name', 'like', '%' . request('users') . '%')
    //             ->orWhere('email', 'like', '%' . request('users') . '%');
    //     }
    // }
    public function podcasts()
    {
        return $this->hasMany(Podcast::class);
    }
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function receivesBroadcastNotificationsOn()
    {
        return 'calling' . $this->id;
    }

    // public function notifications()
    // {
    //     return $this->hasMany(Notification::class);
    // }
}
