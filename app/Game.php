<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Cardset;

class Game extends Model
{
    public function users() 
    {
        return $this->belongsToMany(User::class);
    }

    public function cardsets() 
    {
        return $this->belongsToMany(Cardset::class);
    }
}
