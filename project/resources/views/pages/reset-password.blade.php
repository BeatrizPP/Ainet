
@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Reset Password'))
@endsection


@section('content')

    <div id="user-form">

        <form method="POST" action="/reset-password">

            {{ csrf_field() }}

            <div class="col-lg-6">

                <div class="form-group">
                    <label for="password">New Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Password Confirmation:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <br>

                <div class="form-group">
                    <button type="submit" class="btn btn-default"> Reset Password</button>
                </div>

                @if (! $errors->has('login_message'))
                    @include('layouts.partials.errors')
                @endif

            </div>

        </form>

    </div>



@endsection