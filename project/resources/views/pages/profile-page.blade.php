@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>$user->name))
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            @if($user->presentation != null)
                <div class="well">
                    <p style="font-size: 120%"><b>About me</b></p>
                    <p>
                        {{ $user->presentation }}
                    </p>
                </div>
            @endif

            <div class="well">
                <p style="font-size: 120%"><b>Department</b></p>
                <p>
                    {{ $user->department->name }}
                </p>
                <br>
                <p style="font-size: 120%"><b>Email</b></p>
                <p>
                    {{ $user->email }}
                </p>
                @if($user->phone != null)
                    <br>
                    <p style="font-size: 120%"><b>Phone</b></p>
                    <p>
                        {{ $user->phone }}
                    </p>
                @endif
                @if($user->profile_url != null)
                    <br>
                    <a href="{{ $user->profile_url }}" style="color: #2F3133;font-size: 110%"><b>External Profile Page</b></a>
                @endif
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Email</h3>
                </div>
                <div class="panel-body">
                    {{ $user->email }}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Phone</h3>
                </div>
                <div class="panel-body">
                    {{ $user->phone }}
                </div>
            </div>
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
