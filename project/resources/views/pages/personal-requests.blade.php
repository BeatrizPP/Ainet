@extends('layouts.master')

@section('navigation')
    @include('layouts.partials.navigation.logged_in._navigation_personal_requests')
@endsection

@section('header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        My Requests <small>some subtitle</small>
                    </h1>
                </div>
            </div>
@endsection

@section('content')

    Personal Requests

@endsection
