<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {

        return view('main');
    }

    public function store()
    {

// attempt to authenticate the user

        if (auth()->attempt(['email' => request('email'), 'password' => request('password'), 'blocked' => 0, 'activated'=> 1]))
        {
            return redirect()->home();
        }
        else {
            return back()->withErrors([

                'login_message' => 'One of the following occured:
                                    - Your credentials are wrong
                                    - You are not activated 
                                    - You are blocked'

            ]);
        }
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }


}
