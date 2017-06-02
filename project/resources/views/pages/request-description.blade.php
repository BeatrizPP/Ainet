@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Request Description'))
@endsection



@section('content')

    <div class="row">
        <div class="col-md-6">
            <p style="font-size: 120%"><b>Request id: </b>{{$printRequest->id}}</p>
            <br>
            <p style="font-size: 120%"><b>Status:</b>
                @if($printRequest->status == 0)
                    pending
                @elseif($printRequest->status == 1)
                    refused
                @else
                    completed
                @endif
            </p>
            @if($printRequest->status == 1)
                <p style="font-size: 120%"><b>&emsp; Reason: </b>{{$printRequest->refused_reason}}</p>
            @endif
            <br>
            <p style="font-size: 120%"><b>Description: </b>{{$printRequest->description}}</p>
            <br>
            <p style="font-size: 120%"><b>Due Date: </b>{{$printRequest->due_date}}</p>
            <br>
        </div>

        <div class="col-md-6">
            <p style="font-size: 120%"><b>Quantity: </b>{{$printRequest->quantity}}</p>
            <br>
            <p style="font-size: 120%"><b>Paper Size: </b>A{{$printRequest->paper_size}}</p>
            <br>
            <p style="font-size: 120%"><b>Paper Type: </b>
                @if($printRequest->paper_type == 0)
                    Draft
                @elseif($printRequest->paper_type == 1)
                    Regular
                @else
                    Photographic
                @endif
            </p>
            <br>
            <p style="font-size: 120%"><b>Owner: </b>{{$printRequest->owner->name}}</p>
            <br>
            <p style="font-size: 120%"><b>Colored: </b>
                @if($printRequest->colored == 1)
                    <i class="fa fa-check-square-o"></i>
                @else
                    <i class="fa fa-square-o"></i>
                @endif

            <b>&emsp;&ensp;Stapled: </b>
                @if($printRequest->stapled == 1)
                    <i class="fa fa-check-square-o"></i>
                @else
                    <i class="fa fa-square-o"></i>
                @endif

            <b>&emsp;&ensp;Front-back: </b>
                @if($printRequest->front_back == 1)
                    <i class="fa fa-check-square-o"></i>
                @else
                    <i class="fa fa-square-o"></i>
                @endif
            </p>
        </div>
    </div>

    <hr>

    <div id = "comments-count" style = "margin-top: 50px;">
        <strong>{{$printRequest->comments->count()}} Comments:</strong>

    </div>

    <div class = "container-fluid" id="comment-form">

        <form method="POST" action="{{ route('comment.store', ['printRequestID' => $printRequest->id]) }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name"></label>
                        <textarea class="form-control" rows="4" id="comment" name="comment" required></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-2">
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-default"> Submit </button>
                </div>
            </div>
        </form>
        @include('layouts.partials.errors')
    </div>


    <div class = "comments">

        @foreach ($printRequest->comments as $comment)

            @if($comment->parent == null)
                @if($comment->blocked == 0 || Auth::user()->admin == 1)
                    <br>
                    <div class = "container-fluid">
                        <strong>User: <a href="{{ route('profilePage', ['user' => $comment->user]) }}">{{$comment->user->name}}  ID: {{$comment->id}}   isBlocked: {{$comment->blocked}}</a></strong>
                        <small>{{$comment->created_at->diffForHumans()}}</small>
                        <br>
                        {{$comment->comment}}
                        <br>
                        <a href=<?php echo "#".$comment->id?> data-toggle="collapse">Reply </a>
                        @if ($comment->blocked == 0)
                            <a href="{{ route('comment.switch', ['printRequestID' => $printRequest->id, 'commentID' => $comment->id]) }}">  Report </a>
                        @elseif (Auth::user()->admin == 1)
                            <a href="{{ route('comment.switch', ['printRequestID' => $printRequest->id, 'commentID' => $comment->id]) }}">  Restore </a>
                        @endif
                        <div id=<?php echo $comment->id?> class="collapse">
                            <div id="reply-form">
                                <form method="POST" action="{{ route('comment.reply', ['printRequestID' => $printRequest->id, 'parentCommentID' => $comment->id]) }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="name"></label>
                                                <textarea class="form-control" rows="4" id="reply" name="comment" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-2">
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default"> Submit </button>
                                        </div>
                                    </div>
                                </form>
                                @include('layouts.partials.errors')
                            </div>
                        </div>
                    </div>
                @endif
            @endif

            @foreach($printRequest->comments as $reply)
                @if($reply->blocked == 0 || Auth::user()->admin == 1)

                    @if($reply->parent_id == $comment->id)
                        <br>
                        <div class = "container-fluid">
                            <strong>User: <a href="{{ route('profilePage', ['user' => $reply->user]) }}">{{$reply->user->name}}  ID: {{$reply->id}}  isBlocked: {{$reply->blocked}}</a></strong>
                            <small>{{$reply->created_at->diffForHumans()}}</small>
                            <br>
                            <font color="gray">{{$comment->user->name}}></font>
                            {{$reply->comment}}
                            <br>
                            <a href=<?php echo "#".$reply->id?> data-toggle="collapse">Reply </a>
                            @if ($reply->blocked == 0)
                                <a href="{{ route('comment.switch', ['printRequestID' => $printRequest->id, 'commentID' => $reply->id]) }}">  Report </a>
                            @elseif (Auth::user()->admin == 1)
                                <a href="{{ route('comment.switch', ['printRequestID' => $printRequest->id, 'commentID' => $reply->id]) }}">  Restore </a>
                            @endif
                            <div id=<?php echo $reply->id?> class="collapse">
                                <div id="reply-form">
                                    <form method="POST" action="{{ route('comment.reply', ['printRequestID' => $printRequest->id, 'parentCommentID' => $comment->id]) }}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="name"></label>
                                                    <textarea class="form-control" rows="4" id="reply" name="comment" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-2">
                                            <br>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default"> Submit </button>
                                            </div>
                                        </div>
                                    </form>
                                    @include('layouts.partials.errors')
                                </div>
                            </div>

                        </div>
                    @endif
                @endif
            @endforeach

        @endforeach

    </div>

@endsection