
@extends('layouts.master')

@section('navigation')
    @include('layouts.partials.navigation.logged_out._navigation_logged_out')
@endsection


@section('header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Forgot Password
                    </h1>
                </div>
            </div>
@endsection


@section('content')

    <div id="user-form">

        <form method="POST" action="/forgot-password">

            {{ csrf_field() }}

            <div class="col-lg-6">

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-default"> Send Reset Password Email</button>
                </div>


            </div>

        </form>

    </div>



@endsection