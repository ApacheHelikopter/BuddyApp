<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use DB;
use Session;

class Buddy extends Model
{
    protected $table = 'buddies';

    protected $fillable = ['user_id', 'firstname', 'lastname', 'email', 'password', 'profile_picture', 'bio', 'buddy_status'];

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

    public static function getStatus($buddyId){
        $getName = Buddy::select('buddy_status')->where('id', $buddyId)->first();
        return $getName->buddy_status;
    }

    public static function getCommonInterests($buddyId, $currentUser){
        $userId = Session::get('user')->id;

        $buddyInterests = \App\Interest::whereHas('buddy', function(Builder $query){
            $userId = Session::get('user')->id;
            $query->where('buddy_id', $userId);
        })->pluck('id')->toArray();

        $common = DB::table('buddy_interest')
                ->select(DB::raw('count(*) as common_interests'))
                ->where('buddy_id', $buddyId)
                ->whereIn('interest_id', $buddyInterests)
                ->groupBy('buddy_id')
                ->havingRaw('COUNT(*) > 2')
                ->whereNotIn('buddy_id', [$userId])
                ->get();
        return $common;
    }

    public static function getId($buddyId){
        $getName = Buddy::select('firstname')->where('id', $buddyId)->first();
        return $getName->firstname;
    }
}
