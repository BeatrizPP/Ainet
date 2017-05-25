<?php
/**
 * Created by PhpStorm.
 * User: Bruno
 * Date: 6.5.2017.
 * Time: 16:05
 */

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\PrintRequest;

class RouteController extends BaseController
{
    use ValidatesRequests;

    public function mainView(){
        $totalPrints = User::sum('print_counts');
        $totalRequestsPrinted = Request::where('status', '=', '1')->count('colored');
        $totalRequestsColored = Request::where('status', '=', '1')->where('colored', true)->count('colored');
        if ($totalRequestsPrinted == 0) {
            $percentageColored = 0;
        } else {
            $percentageColored = ($totalRequestsColored * 100)/ $totalRequestsPrinted;
        }
        $departments = Department::get();
        $printsPerDepartment = User::selectRaw('sum(print_counts) as sum, department_id')->groupby('department_id')->get();  //I know, I hoped I wouldn't use raw, but is how I made it work
        $today = Request::where('status', '=', '1')->whereDay('closed_date', date('d')) ->count();
        $month = Request::where('status', '=', '1')->whereMonth('closed_date', date('m')) ->count();
        $contacts = User::get();

        return view('main', compact('totalPrints', 'percentageColored', 'departments', 'printsPerDepartment', 'today', 'month', 'contacts'));
    }

    public function editProfileView(){
        return view('edit-create-profile');
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


}
