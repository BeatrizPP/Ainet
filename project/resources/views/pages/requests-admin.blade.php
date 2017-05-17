@extends('layouts.master')

@section('navigation')
    @include('layouts.partials.navigation.logged_in._navigation_logged_in')
@endsection

@section('header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Admin Requests <small>some subtitle</small>
                    </h1>
                </div>
            </div>
@endsection

@section('content')

    Requests Admin

@endsection
