
@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Create New Profile'))
@endsection

@section('content')
                <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </form>
@endsection



{{--


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

--}}
{{--                <div class="form-group">
                    <label><p>Verify Password:</p></label>
                    <input type="password" class="form-control" required>
                </div>--}}{{--


                --}}
{{--<div class="form-group">
                    <label for="phone">Phone:</p></label>
                    <input class="form-control" required>
                </div>--}}{{--


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

                --}}
{{--<div class="form-group">
                    <label>Upload Photo</label>
                    <input type="file">
                </div>

                <div class="form-group">
                    <label><p>Link to external profile page:</p></label>
                    <input class="form-control">
                </div>--}}{{--

                <br>
                --}}
{{--<a href="#" class="btn btn-default" role="button">Cancel</a>--}}{{--


                <div class="form-group">
                    <button type="submit" class="btn btn-default"> Register</button>
                </div>

                @if (! $errors->has('login_message'))
                    @include('layouts.partials.errors')
                @endif

            </div>
        </form>

    </div>



@endsection--}}
