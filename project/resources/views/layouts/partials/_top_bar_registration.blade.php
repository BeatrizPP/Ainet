<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="{{ route('main') }}">Ainet Print Management</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">@if(count($errors) && $errors->has('login_message'))<i class="fa fa-exclamation-triangle"></i>@endif  <i class="fa fa-user"></i> Log In <b class="caret"></b></a>
                <ul class="dropdown-menu login-dropdown">
                    <form method="POST" action="/login">

                        {{ csrf_field() }}

                        @if ($errors->has('login_message'))
                            @include('layouts.partials.errors')
                        @endif

                        <li>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" {{--placeholder="Enter Email"--}} name="email" id="email" required>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" {{--placeholder="Enter Password"--}} name="password" id="password" required>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="form-group">
                                <button type="submit" style="float: right"><i class="fa fa-fw fa-power-off"></i> Log In</button>
                            </div>
                        </li>
                        {{--<li>
                            <input type="checkbox" checked="checked"> Remember me
                        </li>--}}
                    </form>

                        <li>
                            <span class="psw">Forgot <a href="{{ route('password.request') }}">password</a>?</span>
                        </li>
                </ul>