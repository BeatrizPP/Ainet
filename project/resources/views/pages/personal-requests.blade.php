
@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'My Requests'))
@endsection

@section('content')
    {{--Show Requests--}}
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Request Id</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Owner</th>
                        <th>+ Info</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($printRequests as $request)

                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>
                                @if($request->status == 0)
                                    pending
                                @elseif($request->status == 1)
                                    refused
                                @else
                                    closed
                                @endif
                            </td>
                            <td>{{ $request->due_date }}</td>
                            <td>{{ $request->owner->name }}</td>
                            <td><a href="/request-description/{{ $request->id }}">View Details</a></td>
                            <td><a href="#">Delete</a></td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{--Admin Dashboard--}}
    @if(Auth::user()->admin == 1)
        <div class="row" data-toggle="collapse" data-target="#users">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Users<i class="fa fa-fw fa-caret-down" style="float: right"></i>
                </h1>
            </div>
        </div>
        <div class="row collapse" id="users">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)

                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if($user->activated == 1)
                                        Activated,
                                    @elseif($user->activated == 0)
                                        Non activated,
                                    @endif
                                    @if($user->blocked == 1)
                                        Blocked,
                                    @elseif($user->blocked == 0)
                                        Unblocked,
                                    @endif
                                    @if($user->admin == 1)
                                        Administrator
                                    @elseif($user->admin == 0)
                                        Regular
                                    @endif
                                </td>
                                <td>
                                    @if($user->blocked == 1)
                                        <form method="post" action="/userBlock">
                                            {{ csrf_field() }}
                                            <input  id="hiddenId" type="hidden" name="hiddenId" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-default">Unblock</button>
                                        </form>
                                    @elseif($user->blocked == 0)
                                        <form method="post" action="/userBlock">
                                            {{ csrf_field() }}
                                            <input  id="hiddenId" type="hidden" name="hiddenId" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-default">Block</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    @if($user->admin == 1)
                                        <form method="post" action="/userAdmin">
                                            {{ csrf_field() }}
                                            <input  id="hiddenId" type="hidden" name="hiddenId" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-default">Revoke Admin</button>
                                        </form>
                                    @elseif($user->admin == 0)
                                        <form method="post" action="/userAdmin">
                                            {{ csrf_field() }}
                                            <input  id="hiddenId" type="hidden" name="hiddenId" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-default">Make Admin</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" data-toggle="collapse" data-target="#comments">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Comments<i class="fa fa-fw fa-caret-down" style="float: right"></i>
                </h1>
            </div>
        </div>
        <div class="row collapse" id="comments">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Comment</th>
                            <th>User</th>
                            <th>Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($comments as $comment)

                            <tr>
                                <td>
                                    <a href ="{{ route('requestDescription', ['printRequest' => $comment->request_id]) }}">
                                        {{ $comment->id }}
                                    </a>
                                </td>
                                <td>{{ substr($comment->comment,0,80) }}...</td>
                                <td>{{ $comment->user->name }}</td>
                                <td>@if ($comment->blocked == 0)
                                        Visible
                                    @elseif ($comment->blocked == 1)
                                        Blocked
                                    @endif
                                </td>
                                <td></td>
                                <td>
                                    @if ($comment->blocked == 0)
                                        <a href="{{ route('comment.switch', ['printRequestID' => $comment->request_id, 'commentID' => $comment->id]) }}" class="btn btn-default" role="button" style="float:right">  Block </a>
                                    @elseif ($comment->blocked == 1)
                                        <a href="{{ route('comment.switch', ['printRequestID' => $comment->request_id, 'commentID' => $comment->id]) }}" class="btn btn-default" role="button" style="float:right">  Restore </a>
                                    @endif
                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
