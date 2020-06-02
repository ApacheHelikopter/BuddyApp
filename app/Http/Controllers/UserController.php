<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function handleRegister(Request $request)
    {
        $user = new \App\User();

        $validation = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
        ]);

        if ($validation->fails()) {
            return redirect('/register')
                ->withErrors($validation)->withInput($request->except('password'));
        }

        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->save();

        $userId = $user->id;

        $buddy = BuddiesController::handleRegister($request, $userId);
        $this->handleLogin($request);
        return redirect('/onboarding');
    }

    public function handleLogin(Request $request)
    {
        $request->flash();

        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validation->fails()) {
            return redirect('/login')
                ->withErrors($validation)->withInput($request->except('password'));
        }

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = auth()->user();
            $data['userdetails'] = \App\Buddy::where('user_id', $user->id)->first();
            Session::put('user', $data['userdetails']);
            return redirect('/buddies');
        }
        return redirect('/login')->withErrors('Your email or password was incorrect!');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/login');
    }
}
