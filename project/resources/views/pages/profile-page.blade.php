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
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            @if($user->profile_photo != null)
                <img class="img-thumbnail" src="/profiles/{{ $user->profile_photo }}" alt="">
    {{--        @else
                <img src="/profiles/no-profile-image.jpg" style="width:60px; height: 60px;">--}}
            @endif
        </div>
    </div>


@endsection
