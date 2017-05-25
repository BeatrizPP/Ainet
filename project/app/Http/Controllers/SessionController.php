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

        if (! auth()->attempt(request(['email', 'password'])))
        {
            return back()->withErrors([

                'login_message' => 'Invalid credentials. Please try again.'

            ]);
        }

        return redirect()->home();
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }


}
