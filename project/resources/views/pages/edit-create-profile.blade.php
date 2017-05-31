
@extends('layouts.master')

@section('header')

    @if(Auth::check())
        $title='Edit Profile';
    @else
        $title='Create Profile';
    @endif

    @include('layouts.partials._header', array('title'=>$title))

@endsection


@section('content')

    <div id="user-form">

        <form method="POST" action="/create-profile">

            {{ csrf_field() }}

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
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
                    <label for="department"><p>Department</p></label>
                    <select class="form-control" id="department" name="department">
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
                <button type="submit" class="btn btn-default"> Register</button>

            </div>
        </form>

    </div>



@endsection