<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Session;
use Auth;
use Illuminate\Support\Facades\Validator;

class BuddiesController extends Controller
{
    public function index(){
        $data['users'] = \App\Buddy::get();
        return view('buddies/index', $data);
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
        // $data['users'] = \App\User::find($buddy)->first();
        $data['buddy'] = \App\Buddy::where('id', $buddy)->with('interests')->first();
        $data['me'] = auth()->user()->id;
        return view('buddies/show', $data);
    }

    public function update(Request $request){
        $userId = Session::get('user')->id;
        $validation = Validator::make($request->all(), [
            'firstname' => 'string|required',
            'lastname' => 'string|required',
            'bio' => 'string',
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

    public function store(Request $request){

    }
}
