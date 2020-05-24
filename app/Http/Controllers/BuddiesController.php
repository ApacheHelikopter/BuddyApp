<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuddiesController extends Controller
{
    public function index(){
        $data['users'] = \App\User::get();
        return view('buddies/index', $data);
    }

    public function show($buddy){
        // $data['users'] = \App\User::find($buddy)->first();
        $data['buddy'] = \App\User::where('id', $buddy)->with('interests')->first();
        $data['me'] = auth()->user()->id;
        return view('buddies/show', $data);
    }

    public function create(){
        return view('buddies/create');
    }

    public function store(Request $request){

    }
}
