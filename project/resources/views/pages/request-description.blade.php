@extends('layouts.master')

@section('navigation')
    @if(Auth::check())
        @include('layouts.partials.navigation.logged_in._navigation_list_all_requests')
    @else
        @include('layouts.partials.navigation.logged_out._navigation_logged_out_list_all_requests')
    @endif
@endsection

@section('header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Request Info <small>some subtitle</small>
                    </h1>
                </div>
            </div>
@endsection

@section('content')


    Request Description

@endsection

