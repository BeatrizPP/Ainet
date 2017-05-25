@extends('layouts.master')

@section('navigation')
    @if(Auth::check())
        @include('layouts.partials.navigation.logged_in._navigation_logged_in')
    @else
        @include('layouts.partials.navigation.logged_out._navigation_logged_out')
    @endif
@endsection

@section('header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        A User Profile <small>some subtitle</small>
                    </h1>
                </div>
            </div>
@endsection

@section('content')

    User Profile

    <p>
        {{ $user->id }}
    </p>
    <p>
        {{ $user->name }}
    </p>

@endsection
