<?php

namespace App\Http\Controllers;

use App\Comment;
use App\PrintRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store($printRequestID)
    {

        $this->validate(request(), [
            'comment' => 'required|min:2'
        ]);


        Comment::create([
            'comment' => request('comment'),
            'blocked' => 0,
            'request_id' => $printRequestID,
            'parent_id' => null,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now()
        ]);

        return back();
    }

    public function reply($printRequestID, $parentCommentID)
    {
        $this->validate(request(), [
            'comment' => 'required|min:2'
        ]);

        Comment::create([
            'comment' => request('comment'),
            'blocked' => 0,
            'request_id' => $printRequestID,
            'parent_id' => $parentCommentID,
            'user_id' => Auth::id(),
            'created_at' => Carbon::now()
        ]);
        return back();
    }

    public function switch($printRequestID, $commentID)
    {
        $comment = Comment::where('id', '=', $commentID)->value('blocked');
        if($comment == 0)
            Comment::where('id', '=', $commentID)->update(['blocked' => 1]);
        else
            Comment::where('id', '=', $commentID)->update(['blocked' => 0]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
