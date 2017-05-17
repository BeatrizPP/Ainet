@extends('layouts.master')

@section('navigation')
    @if(Auth::check())
        @include('layouts.partials.navigation.logged_in._navigation_main')
    @else
        @include('layouts.partials.navigation.logged_out._navigation_logged_out_main')
    @endif
@endsection

@section('header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Home <small>Statistics Overview</small>
                    </h1>
                </div>
            </div>
@endsection

@section('content')

    Home

@endsection
