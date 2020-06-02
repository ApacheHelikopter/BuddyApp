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
        return $this->belongsToMany('\App\Interest');
    }

    public function friends(){
        return $this->belongsToMany('\App\Friendship', 'friendships', 'buddy_id', 'friend_id');
    }

    public static function getName($buddyId){
        $getFirstName = Buddy::select('firstname')->where('id', $buddyId)->first();
        $getLastName = Buddy::select('lastname')->where('id', $buddyId)->first();
        return $fullName = $getFirstName->firstname . " " . $getLastName->lastname;
    }

    public static function getClass($buddyId){
        $getName = Buddy::select('class')->where('id', $buddyId)->first();
        return $getName->class;
    }

    public static function getBio($buddyId){
        $getName = Buddy::select('bio')->where('id', $buddyId)->first();
        return $getName->bio;
    }

    public static function getProfilePicture($buddyId){
        $getName = Buddy::select('profile_picture')->where('id', $buddyId)->first();
        return $getName->profile_picture;
    }

    public static function getId($buddyId){
        $getName = Buddy::select('firstname')->where('id', $buddyId)->first();
        return $getName->firstname;
    }
}
