<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Database\Eloquent\Builder;

class InterestsController extends Controller
{
    public function index($buddy){
        $auth = Session::get('user');
        if($auth){
            $data['buddy'] = \App\Buddy::where('id', $buddy)->first();
            $data['allInterests'] = \App\Interest::whereDoesntHave('buddy', function(Builder $query){
                $userId = Session::get('user')->id;
                $query->where('buddy_id', $userId);
            })->get();

            return view('buddies/interests', $data);
        } else{
            return redirect('/login');
        }

    }

    public function onboarding(){
        $data['buddy'] = \App\Buddy::where('id', auth()->user()->id)->first();
        $data['allInterests'] = \App\Interest::whereDoesntHave('buddy', function(Builder $query){
            $userId = Session::get('user')->id;
            $query->where('buddy_id', $userId);
        })->get();

        return view('onboarding', $data);


    }

    public function addInterest($interestId)
    {
        $userId = Session::get('user')->id;
        $user = \App\Buddy::where('id', $userId)->first();
        $interest = \App\Interest::find($interestId);
        $user->interests()->attach($interest);
        return redirect()->back();
    }

    public function removeInterest($interestId)
    {
        $userId = Session::get('user')->id;
        $user = \App\Buddy::where('id', $userId)->first();
        $interest = \App\Interest::find($interestId);
        $user->interests()->detach($interest);
        return redirect()->back();
    }
}
