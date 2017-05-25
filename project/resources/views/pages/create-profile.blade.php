
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
                        @if(Auth::check())
                            Edit Profile
                        @else
                            Create Profile
                        @endif
                    </h1>
                </div>
            </div>
@endsection


@section('content')

    <div id="user-form">

        <form method="POST" action="/create-profile">

            {{ csrf_field() }}

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

{{--                <div class="form-group">
                    <label><p>Verify Password:</p></label>
                    <input type="password" class="form-control" required>
                </div>--}}

                {{--<div class="form-group">
                    <label for="phone">Phone:</p></label>
                    <input class="form-control" required>
                </div>--}}

                <div class="form-group">
                    <label for="department_id"><p>Department</p></label>
                    <select class="form-control" id="department_id" name="department_id">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6">

                {{--<div class="form-group">
                    <label>Upload Photo</label>
                    <input type="file">
                </div>

                <div class="form-group">
                    <label><p>Link to external profile page:</p></label>
                    <input class="form-control">
                </div>--}}
                <br>
                {{--<a href="#" class="btn btn-default" role="button">Cancel</a>--}}

                <div class="form-group">
                    <button type="submit" class="btn btn-default"> Register</button>
                </div>

                @if (! $errors->has('login_message'))
                    @include('layouts.partials.errors')
                @endif

            </div>
        </form>

    </div>



@endsection