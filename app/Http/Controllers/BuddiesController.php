<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Builder;

class BuddiesController extends Controller
{
    public function index(){
        $auth = Session::get('user');
        if($auth){
            $userId = Session::get('user')->id;

            $buddyInterests = \App\Interest::whereHas('buddy', function(Builder $query){
                $userId = Session::get('user')->id;
                $query->where('buddy_id', $userId);
            })->pluck('id')->toArray();


            $data['matchingUser'] = DB::table('buddy_interest')
                ->select(DB::raw('count(*) as common_interests, buddy_id'))
                ->whereIn('interest_id', $buddyInterests)
                ->groupBy('buddy_id')
                ->havingRaw('COUNT(*) > 2')
                ->whereNotIn('buddy_id', [$userId])
                ->get();

            $data['users'] = \App\Buddy::whereNotIn('id', [$userId])->get();

            return view('buddies/index', $data);
        } else{
            return redirect('/login');
        }
    }

    public static function handleRegister(Request $request, int $userId){
        $buddy = new \App\Buddy();
        $buddy->user_id = $userId;
        $buddy->firstname = $request->input('firstname');
        $buddy->lastname = $request->input('lastname');
        $buddy->profile_picture = 'mock.png';
        $buddy->save();
        return $buddy;
    }

    public function show($buddy){
        $userId = Session::get('user')->id;
        $data['buddy'] = \App\Buddy::where('id', $buddy)->first();
        $data['me'] = auth()->user()->id;
        $data['friendRequests'] = \App\Friendship::where('friend_id', $userId)->where('status', 'pending')->get();

        $friendCount = \App\Friendship::where([['buddy_id', '=', $userId], ['friend_id', '=', $buddy]])->orWhere([['buddy_id', '=', $buddy], ['friend_id', '=', $userId]])->count();
        if($friendCount > 0){
            $friendshipDetails = \App\Friendship::where([['buddy_id', '=', $userId], ['friend_id', '=', $buddy]])->orWhere([['buddy_id', '=', $buddy], ['friend_id', '=', $userId]])->first();
            if($friendshipDetails->status === 'pending'){
                $friendStatus = 'Buddy request sent';
            } else if($friendshipDetails->status === 'confirmed'){
                $friendStatus = 'Remove buddy';
            } else{
                $friendStatus = 'Add buddy';
            }
        } else{
            $friendStatus = 'Add buddy';
        }
        return view('buddies/show', $data)->with('friendStatus', $friendStatus);
    }

    public function update(Request $request){
        $userId = Session::get('user')->id;
        $validation = Validator::make($request->all(), [
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'bio' => 'string|max:200',
            'birth_date' => 'before:'.date('Y-m-d').'|date|required',
            'class' => 'string|required',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validation->fails()) {
            return redirect("/buddies/$userId")
                ->withErrors($validation)->withInput($request->except('password'));
        }

        $buddy = \App\Buddy::with('user')->where('id', $userId)->first();
        $buddy->firstname = $request->input('firstname');
        $buddy->lastname = $request->input('lastname');
        $buddy->bio = $request->input('bio');
        $buddy->class = $request->input('class');
        $buddy->buddy_status = $request->input('status');
        $buddy->birth_date = $request->input('birth_date');
        if($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture')->getClientOriginalName();
            $request->file('profile_picture')->storeAs('profile_picture', $userId . '/' . $image, '');
            $buddy->profile_picture = $image;
        }
        $buddy->SAVE();
        Session::put('user', $buddy);
        return redirect("/buddies/$userId")
            ->with('green', 'User details has been updated!');
    }

    public function addFriend($buddyId){
        $userId = Session::get('user')->id;
        $friendship = new \App\Friendship();
        $friendship->buddy_id = $userId;
        $friendship->friend_id = $buddyId;
        $friendship->acted_user = $userId;
        $friendship->status = 'pending';
        $friendship->save();
        return redirect()->back();
    }

    public function removeFriend($buddyId){
        $userId = Session::get('user')->id;
        $friendCount = \App\Friendship::where([['buddy_id', '=', $userId], ['friend_id', '=', $buddyId]])->orWhere([['buddy_id', '=', $buddyId], ['friend_id', '=', $userId]])->count();

        if($friendCount > 0){
            $userId = Session::get('user')->id;
            \App\Friendship::where([['buddy_id', '=', $userId], ['friend_id', '=', $buddyId]])->orWhere([['buddy_id', '=', $buddyId], ['friend_id', '=', $userId]])->delete();
            return redirect()->back();
        } else{
            return redirect()->back()->with('red', 'Something went wrong');
        }

        return redirect()->back();
    }

    public function acceptBuddyRequest($buddyId){
        $receiverId = Session::get('user')->id;
        \App\Friendship::where('buddy_id', '=', $buddyId)->where('friend_id', '=', $receiverId)->update(['status' => 'confirmed']);
        return redirect()->back()->with('green', 'Accepted buddy request');
    }

    public function ignoreBuddyRequest($buddyId){
        $receiverId = Session::get('user')->id;
        \App\Friendship::where('buddy_id', '=', $buddyId)->where('friend_id', '=', $receiverId)->update(['status' => 'blocked']);
        return redirect()->back()->with('green', 'Ignored buddy request');
    }

    public function store(Request $request){

    }
}
