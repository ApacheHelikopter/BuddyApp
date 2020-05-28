<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected $table = 'friendships';
    protected $fillable = ['buddy_id', 'friend_id', 'acted_user', 'status'];

    public function buddy(){
        return $this->belongsToMany('\App\Buddy');
    }
}
