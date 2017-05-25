<?php

namespace App\Http\Controllers;

use App\PrintRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::check()) {
            $printRequests = PrintRequest::all();
            return view('list-of-all-requests', compact('printRequests'));
        } else {
            return redirect()->route('main');
        }
    }

    public function currentUserIndex()
    {
        $id = Auth::id();
        $printRequests = PrintRequest::where('owner_id', $id)->get();
        return view('personal-requests', compact('printRequests'));

    }

    public function show(PrintRequest $printRequest)
    {
        return view('request-description', compact('printRequest'));
    }


//    -----------------------


    public function create()
    {
        return view('request-create');
    }


    public function store(Request $request)
    {
        // Validate the form

        $this->validate(request(), [

            'quantity' => 'required',

            'paper_size' => 'required',

            'paper_type' => 'required',

            'file' => 'required'

        ]);


        // Create and save the request

        PrintRequest::create([
            'status' => 0,
            'quantity' => request('quantity'),
            'paper_size' => request('paper_size'),
            'paper_type' => request('paper_type'),
            'file' => request('file'),
            'owner_id' => auth()->id()
        ]);

        // Redirect to user requests page

        return redirect('/personal-requests');
    }

    public function edit(PrintRequest $printRequest)
    {
        //
    }

    public function update(Request $request, PrintRequest $printRequest)
    {
        //
    }

    public function destroy(PrintRequest $printRequest)
    {
        //
    }
}
