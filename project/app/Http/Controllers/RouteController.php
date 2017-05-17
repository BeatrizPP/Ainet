<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 6.5.2017.
 * Time: 16:05
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use DB;

class RouteController extends BaseController
{
    use ValidatesRequests;

    public function mainView(){
        return view('main');
    }

    public function contactsView(){

        $users = DB::table('users')->get();

        return view('contacts',compact('users'));
    }

    public function profilePageView(){
        return view('profile-page');
    }

    public function editProfileView(){
        return view('edit-create-profile');
    }

    public function requestDescriptionView(){
        if (Auth::check())
        {
            return view('request-description');
        }
        else{
            return redirect()->route('main');
        }
    }

    public function listRequestsView()
    {
        if (Auth::check()) {
            return view('personal-requests');
        }
    }

    public function requestsAdminView(){
        if (Auth::check())
        {
            return view('requests-admin');
        }
        else{
            return redirect()->route('main');
        }
    }

    public function requestsCreationEditView(){
        if (Auth::check())
        {
            return view('requests-creation-edit');
        }
        else{
            return redirect()->route('main');
        }
    }

    public function allRequestsView(){

        $requests = DB::table('requests')->get();

        return view('list-of-all-requests',compact('requests'));

    }

}
