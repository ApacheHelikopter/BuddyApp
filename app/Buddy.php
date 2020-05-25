<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buddy extends Model
{
    protected $table = 'buddies';

    protected $fillable = ['user_id', 'firstname', 'lastname', 'email', 'password', 'profile_picture'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function interests(){
        return $this->hasMany('\App\Interest');
    }
}
