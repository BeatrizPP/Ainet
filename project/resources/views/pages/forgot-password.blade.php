
@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Forgot Password'))
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