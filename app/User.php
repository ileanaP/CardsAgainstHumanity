<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Game;


class User extends Authenticatable
{
    use Notifiable;

    const VERIFIED = 'verified';
    const UNVERIFIED = 'unverified';
    const INGAME = 'yes';
    const NOT_INGAME = 'no';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function games() 
    {
        return $this->belongsToMany(Game::class);
    }

    public static function generateVerificationCode()
    {
        return str_random(40);
    }
}
