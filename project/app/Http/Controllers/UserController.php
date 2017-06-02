<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $users = User::paginate(15);

        return view('contacts', compact('users'));
    }

    public function indexOrdered($orderCode)
    {
        switch ($orderCode){
            case 0:
                $users = User::orderby('name','asc')->paginate(15);
                break;
            case 1:
                $users = User::orderby('name','desc')->paginate(15);
                break;
        }

        return view('contacts', compact('users'));
    }

    public function block(Request $request){
        if(Auth::user()->isAdmin()){
            $id=$request->input('hiddenId');
            $user=User::find($id);
            if($user->blocked==1){
                $user->blocked=0;
            }else{
                $user->blocked=1;
            }
            $user->save();

            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function makeAdmin(Request $request){
        if(Auth::user()->isAdmin()){
            $id=$request->input('hiddenId');
            $user=User::find($id);
            if($user->admin==1){
                $user->admin=0;
            }else{
                $user->admin=1;
            }
            $user->save();

            return redirect()->back();
        }else{
            return redirect()->back();
        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        return view('profile-page', compact('user'));
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
