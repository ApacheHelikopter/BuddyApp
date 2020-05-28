<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

class MyBuddiesController extends Controller
{
    public function index(){
        $auth = Session::get('user');
        if($auth){
            $userId = Session::get('user')->id;
            // $friendCount = \App\Friendship::where('buddy_id', '=', $userId)->count();
            $data['friends'] = \App\Friendship::where([['buddy_id', '=', $userId], ['status', '=', 'confirmed']])->orWhere([['friend_id', '=', $userId], ['status', '=', 'confirmed']])->get();

            // if($friendCount > 0){
            //     $data['friends'] = \App\Friendship::where([['buddy_id', '=', $userId], ['status', '=', 'confirmed']])->get();

            // } else{
            //     $data['friends'] = \App\Friendship::where([['friend_id', '=', $userId], ['status', '=', 'confirmed']])->get();
            // }

            return view('mybuddies/index', $data);
        } else{
            return redirect('/login');
        }

    }
}
