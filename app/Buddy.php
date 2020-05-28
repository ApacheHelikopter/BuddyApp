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

    public function friends(){
        return $this->belongsToMany('\App\Friendship', 'friendships', 'buddy_id', 'friend_id');
    }

    public static function getName($buddyId){
        $getName = Buddy::select('firstname')->where('id', $buddyId)->first();
        return $getName->firstname;
    }

    public static function getId($buddyId){
        $getName = Buddy::select('firstname')->where('id', $buddyId)->first();
        return $getName->firstname;
    }
}
