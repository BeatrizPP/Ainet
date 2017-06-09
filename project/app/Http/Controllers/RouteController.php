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
use App\Department;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\DB;

class RouteController extends BaseController
{
    use ValidatesRequests;

    public function mainView(){

        $totalPrints = User::sum('print_counts');
        $totalRequestsPrinted = PrintRequest::where('status', '=', '2')->count('colored');
        $totalRequestsColored = PrintRequest::where('status', '=', '2')->where('colored', true)->count('colored');
        if ($totalRequestsPrinted == 0) {
            $percentageColored = 0;
        } else {
            $percentageColored = ($totalRequestsColored * 100)/ $totalRequestsPrinted;
        }
        $departments = Department::get();
        $printsPerDepartment = User::selectRaw('sum(print_counts) as sum, department_id')->groupby('department_id')->get();
        $today = PrintRequest::where('status', '=', '2')->whereDay('closed_date', date('d')) ->count();
        $month = PrintRequest::where('status', '=', '2')->whereMonth('closed_date', date('m')) ->count();
        $contacts = User::get();
        $monthAvg = round($month / date('d'));
        /*$printsPerUser = PrintRequest::select(DB::raw('requests.sum(quantity) as sum, requests.owner_id'))
                            //->where('status', '=', '2')
                            ->groupby('owner_id')
                            ->Leftjoin(DB::raw('(select id, department_id from users) as users'), 'users.id', '=', 'requests.owner_id')
                            //->get();
                            ->pluck('sum','owner_id','users.department_id');
//        $printsPerDepartment = PrintRequest::select(DB::raw('requests.*'))
//            ->join(DB::raw('(select id,department_id from users) as users'), 'users.id', '=', 'requests.owner_id')
//            ->where('status', '=', '2')
//            ->pluck('requests.id','department_id');
            //->groupby('department_id')
            //->selectRaw('sum(quantity) as sum, department_id')
            //->pluck('sum','department_id');

        dd($printsPerUser);

        $totalRequestsPrinted = PrintRequest::where('status', '=', '2')->sum('quantity');
        $print_counts = User::sum('print_counts');
        $colorRequestsPrinted = PrintRequest::where('status', '=', '2')->where('colored', '=','1')->sum('quantity');
        $blackRequestsPrinted = PrintRequest::where('status', '=', '2')->where('colored', '=',0)->sum('quantity');



        if ($totalRequestsPrinted == 0) {
            $percentageColored = 0;
        } else {
            $percentageColored = ($colorRequestsPrinted * 100)/ $totalRequestsPrinted;
        }

        $departments = Department::get();



/*            ->leftJoin(DB::raw('(select id,name from users) as users'), 'users.id', '=', 'requests.owner_id')
            ->orderBy('name', 'asc')
            ->paginate(20);

        $printRequests = PrintRequest::select(DB::raw('requests.*'))
            ->leftJoin(DB::raw('(select id,name from users) as users'), 'users.id', '=', 'requests.owner_id')
            ->orderBy('name', 'asc')
            ->paginate(20);*/

        /*$printsPerDepartment = User::selectRaw('sum(print_counts) as sum, department_id')->groupby('department_id')->get();

        $printsPerDepartment = User::selectRaw('sum(print_counts) as sum, department_id')->groupby('department_id')->get();

        $today = PrintRequest::where('status', '=', '2')->whereDay('closed_date', date('d')) ->count();
        $month = PrintRequest::where('status', '=', '2')->whereMonth('closed_date', date('m')) ->count();*/


        $isDepSelected = false;  //no department selected*/

        return view('main', compact('totalPrints', 'percentageColored', 'departments', 'printsPerDepartment', 'today', 'month', 'contacts', 'isDepSelected','monthAvg'));

    }

    public function mainViewByDepartment($depID) {
        $totalPrints = User::sum('print_counts');
        $totalRequestsPrinted = PrintRequest::where('status', '=', '2')->count('colored');
        $totalRequestsColored = PrintRequest::where('status', '=', '2')->where('colored', true)->count('colored');
        if ($totalRequestsPrinted == 0) {
            $percentageColored = 0;
        } else {
            $percentageColored = ($totalRequestsColored * 100)/ $totalRequestsPrinted;
        }
        $departments = Department::get();
        $printsPerDepartment = User::selectRaw('sum(print_counts) as sum, department_id')->groupby('department_id')->get();
        $today = PrintRequest::where('status', '=', '2')->whereDay('closed_date', date('d')) ->count();
        $month = PrintRequest::where('status', '=', '2')->whereMonth('closed_date', date('m')) ->count();
        $contacts = User::get();
        $monthAvg = $month / date('d');

        // for the departments
        $departmentStatistics = User::get()->where('department_id', '=', $depID);
        $sumPrintsPerDepartment = 0;
        foreach ($departmentStatistics as $depStat){
            $sumPrintsPerDepartment += $depStat->print_counts;
        }

        $department1 = $departments->find($depID);
        $depName = $department1->name;
        $requests = $department1->printRequests;
        $depTotalCounter =0;
        $depColoredCounter = 0;
        $depToday = 0;
        $depMonth = 0;
        foreach ($requests as $request) {
            if($request->status == 2){
                $depTotalCounter++;
                if($request->colored == 1){
                    $depColoredCounter++;
                }
                $dayString = $request->closed_date;
                //$dayString = "2017-05-26 14:44:00"; //example for today
                $dayStringSub = substr($dayString, 0, 10);
                if( strtotime('now') >= strtotime($dayStringSub . " 00:00") && strtotime('now') <  strtotime($dayStringSub . " 23:59")){
                    $depToday++;
                }
                $monthStringSub = substr($dayString, 0, 7);
                if( strtotime('now') >= strtotime($monthStringSub . "-01 00:00") && strtotime('now') <  strtotime($monthStringSub . "-31 23:59")){
                    $depMonth++;
                }
            }
        }

        if ($depTotalCounter == 0) {
            $percColoredByDepartment = 0;
        } else {
            $percColoredByDepartment = ($depColoredCounter * 100)/ $depTotalCounter;
        }

        $isDepSelected = true;  //$depID is the selected department's id
        return view('main', compact('totalPrints', 'percentageColored', 'departments', 'printsPerDepartment', 'today', 'month', 'contacts', 'depName', 'sumPrintsPerDepartment', 'percColoredByDepartment', 'depToday', 'depMonth', 'isDepSelected','monthAvg'));
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
