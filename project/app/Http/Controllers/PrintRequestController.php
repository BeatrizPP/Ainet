<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Department;
use App\Printer;
use App\PrintRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PrintRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $printRequests = PrintRequest::paginate(20);
            $departments = Department::all();
            $users = User::all();
            $printers = Printer::all();
            return view('list-of-all-requests', compact('printRequests','departments','users','printers'));
        } else {
            return redirect()->route('main');
        }
    }

    public function indexOrdered($orderCode)
    {
        if (Auth::check()) {
            switch ($orderCode){
                case 0:
                    $printRequests = PrintRequest::orderBy('id', 'asc')->paginate(20);
                    break;
                case 1:
                    $printRequests = PrintRequest::orderBy('id', 'desc')->paginate(20);
                    break;
                case 2:
                    $printRequests = PrintRequest::orderBy('status', 'asc')->paginate(20);
                    break;
                case 3:
                    $printRequests = PrintRequest::orderBy('status', 'desc')->paginate(20);
                    break;
                case 4:
                    $printRequests = PrintRequest::orderBy('due_date', 'asc')->paginate(20);
                    break;
                case 5:
                    $printRequests = PrintRequest::orderBy('due_date', 'desc')->paginate(20);
                    break;
                case 6:
                    $printRequests = PrintRequest::select(DB::raw('requests.*'))
                        ->leftJoin(DB::raw('(select id,name from users) as users'), 'users.id', '=', 'requests.owner_id')
                        ->orderBy('name', 'asc')
                        ->paginate(20);
                    break;
                case 7:
                    $printRequests = PrintRequest::select(DB::raw('requests.*'))
                        ->leftJoin(DB::raw('(select id,name from users) as users'), 'users.id', '=', 'requests.owner_id')
                        ->orderBy('name', 'desc')
                        ->paginate(20);
                    break;
            }
            $departments = Department::all();
            $users = User::all();
            $printers = Printer::all();
            return view('list-of-all-requests', compact('printRequests','departments','users','printers'));
        } else {
            return redirect()->route('main');
        }
    }



    public function currentUserIndex()
    {
        $id = Auth::id();
        $printRequests = PrintRequest::where('owner_id', $id)->get();
        $users = User::all();
        $comments = Comment::all();
        return view('personal-requests', compact('printRequests','users','comments'));

    }



    public function filter(Request $request){
        if(Auth::check()) {
            $printRequests = PrintRequest::where('status', $request->input('optionsRadiosInline'))
                ->orWhere('owner_id', $request->input('ownerName'))
                ->leftJoin(DB::raw('(select id,name,department_id from users) as users'), 'users.id', '=', 'requests.owner_id')
                ->orWhere('users.department_id',$request->input('departmentSelect'))
                //->orWhere('due_date',$request->input('date'))
                ->where('description','LIKE','%'.$request->input('expression').'%')
                ->paginate(20);

            $departments = Department::all();
            $users = User::all();
            $printers = Printer::all();
            return view('list-of-all-requests', compact('printRequests', 'departments', 'users', 'printers'));
        }else{
            return redirect()->route('main');
        }
    }

    public function show(PrintRequest $printRequest)
    {
        $printers = Printer::all();
        return view('request-description', compact('printRequest','printers'));
    }


    public function approve(Request $request){
        if(Auth::user()->isAdmin()){
            $id=$request->input('hiddenId');
            $printRequest=PrintRequest::find($id);
            $printRequest->status=2;
            $printRequest->printer_id=$request->input('printer');
            $printRequest->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function deny(Request $request){
        if(Auth::user()->isAdmin()){
            $id=$request->input('hiddenId');
            $printRequest=PrintRequest::find($id);
            $printRequest->status=1;
            $printRequest->refused_reason=$request->input('justification');
            $printRequest->save();
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }


//    -----------------------


    public function create()
    {
        return view('request-create');
    }


    public function store()
    {
        // Validate the form

        $this->validate(request(), [

            'file' => 'required',//|file',//regex:pattern
            'description' => 'required',
            'due_date'=> 'nullable|date|after:now',
            'quantity' => 'required|integer|min:1',
            'paper_size' => 'required|integer|between:3,4',
            'paper_type' => 'required|integer|between:0,2',
            'colored' => 'nullable|integer|between:0,1',
            'stapled'=>'nullable|integer|between:0,1',
            'front_back'=>'nullable|integer|between:0,1',
        ]);

        // Create and save the request

        $printRequest = new PrintRequest();
        $printRequest->fill(request()->all());
        $printRequest->status = 0;
        $printRequest->owner_id = Auth::id();

        $fileToPrint = request('file');
        $fileName = Auth::id() . '.' . time() . '.' . $fileToPrint->getClientOriginalExtension();

        $fileToPrint->move(base_path() . '/public/files/', $fileName);

        $printRequest->file = $fileName;
        $printRequest->save();

        // Redirect to user requests page

        return redirect('/personal-requests');
    }

    public function edit(PrintRequest $printRequest)
    {
        return view('request-edit', compact('printRequest'));
    }

    public function update(Request $request)
    {
        $id=$request->input('hiddenId');
        $printRequest=PrintRequest::find($id);

        $this->validate(request(), [
            'file' => 'required',//|file',//regex:pattern
            'description' => 'required',
            'due_date'=> 'nullable|date|after:now',
            'quantity' => 'required|integer|min:1',
            'paper_size' => 'required|integer|between:3,4',
            'paper_type' => 'required|integer|between:0,2',
            'colored' => 'nullable|integer|between:0,1',
            'stapled'=>'nullable|integer|between:0,1',
            'front_back'=>'nullable|integer|between:0,1',
        ]);

        $PrintRequest->description = $request->input('description');
        $PrintRequest->due_date = $request->input('due_date');
        $PrintRequest->quantity = $request->input('quantity');
        $PrintRequest->paper_size = $request->input('paper_size');
        $PrintRequest->paper_type = $request->input('paper_type');
        $PrintRequest->colored = $request->input('colored');
        $PrintRequest->stapled = $request->input('stapled');
        $PrintRequest->front_back = $request->input('front_back');
        $fileToPrint = request('file');
        $fileName = Auth::id() . '.' . time() . '.' . $fileToPrint->getClientOriginalExtension();

        $fileToPrint->move(base_path() . '/public/files/', $fileName);

        $printRequest->file = $fileName;
        $printRequest->save();

        return view('request-description', compact('printRequest'));
    }

}
