<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('create-profile');
    }

    public function store()
    {
        // Validate the form

        $this->validate(request(), [

            'name' => 'required',

            'email' => 'required|unique:users|email',

            'password' => 'required|confirmed',

            'department_id' => 'required'

        ]);



        // Create and save the user

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'department_id' => request('department_id'),
            'remember_token' => str_random(10)
        ]);


        Mail::to(request('email'))->send(new Activation($user));
        // Redirect to the home page

        return redirect('/')->with('status', 'We sent you an activation code. Check your email.');
    }

    public function verify($token){

        User::where('remember_token',$token)->firstOrFail()->verified();


        return redirect('/')->with('status','You are now verified');
    }
}*/
