@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>$user->name))
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @if($user->presentation != null)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">About me:</h3>
                    </div>
                    <div class="panel-body">
                        {{ $user->presentation }}
                    </div>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Email</h3>
                </div>
                <div class="panel-body">
                    {{ $user->email }}
                </div>
            </div>
            @if($user->phone != null)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Phone</h3>
                    </div>
                    <div class="panel-body">
                        {{ $user->phone }}
                    </div>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Department</h3>
                </div>
                <div class="panel-body">
                    {{ $user->department->name }}
                </div>
            </div>
            @if($user->profile_url != null)
                <div class="well">
                    <a href="{{ $user->profile_url }}" style="color: #2F3133;font-size: 110%"><b>External Profile Page</b></a>
                </div>
            @endif
        </div>
        <div class="col-lg-4 text-center">
            <div class="row">
                @if($user->profile_photo != null)
                    <img class="img-thumbnail" src="/profiles/{{$user->profile_photo}}" style="width:150px; height: 150px;">
                @else
                    <img class="img-thumbnail" src="/profiles/no-profile-image.jpg" style="width:150px; height: 150px;">
                @endif
            </div>
            <br>

            @if($user->isBlocked())
                <div class="row">
                    <b>This user is blocked!</b>
                </div>
                <br>
            @endif
            @if($user->isAdmin())
                <div class="row">
                    <b> This user is an admin </b>
                </div>
                <br>
            @endif

            @if(Auth::check() && $user->id == Auth::user()->id)
                <div class="row">
                    <a href ="{{ route('editUser', ['user' => $user]) }}">
                        <button type="submit" class="btn btn-default" style="width: 180px">Edit My Profile</button>
                    </a>
                </div>
                <br>
            @endif
            @if(Auth::check() && Auth::user()->isAdmin())
                @if(!$user->isBlocked())
                    <div class="row">
                        <form method="post" action="/userBlock">
                            {{ csrf_field() }}
                            <input  id="hiddenId" type="hidden" name="hiddenId" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-default" style="width: 180px">Block User </button>
                        </form>
                    </div>
                    <br>
                @endif
                @if($user->isBlocked())
                    <div class="row">
                        <form method="post" action="/userBlock">
                            {{ csrf_field() }}
                            <input  id="hiddenId" type="hidden" name="hiddenId" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-default" style="width: 180px">Unblock User </button>
                        </form>
                    </div>
                    <br>
                @endif
                @if(!$user->isAdmin())
                    <div class="row">
                        <form method="post" action="/userAdmin">
                            {{ csrf_field() }}
                            <input  id="hiddenId" name="hiddenId" type="hidden" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-default" style="width: 180px">Make Admin </button>
                        </form>
                    </div>
                    <br>
                @endif
                @if($user->isAdmin())
                    <div class="row">
                        <form method="post" action="/userAdmin">
                            {{ csrf_field() }}
                            <input  id="hiddenId" name="hiddenId" type="hidden" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-default" style="width: 180px">Remove admin</button>
                        </form>
                    </div>
                    <br>
                @endif
            @endif
        </div>
    </div>


@endsection
