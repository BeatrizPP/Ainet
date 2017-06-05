<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','indexOrdered', 'show']);
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
        $departments = Department::all();
        return view('edit-profile', compact('user','departments'));
    }

    public function update(Request $request, User $user)
    {
        $id=$request->input('hiddenId');
        $user=User::find($id);

        $this->validate(request(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'department' => 'required'

        ]);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->presentation = $request->input('presentation');
        if($request->input('password') != null){
            $user->password = $request->input('password');
        }
        $user->department_id = (int) $request->input('department');

        if($request->hasFile('avatar')){
            $profile = $request->file('avatar');
            $filename = time() . '.' . $profile->getClientOriginalExtension();
            Image::make($profile)->resize(300, 300)->save(public_path('profiles/' . $filename));
            //$profile->move('profiles', $profile->getClientOriginalName());
            $user->profile_photo = $filename;
        }

        $user->profile_url = $request->input('profile_url');
        $user->save();
        return view('profile-page', compact('user'));

    }

    public function destroy(User $user)
    {
        //
    }
}
