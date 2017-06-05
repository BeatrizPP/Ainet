<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="#{{ route('main') }}">Ainet Print Management</a>
        </div>

        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('profilePage', ['user' => Auth::user()]) }}"><i class="fa fa-fw fa-user"></i> My Profile</a>
                    </li>
                    <li>
                        <a href="{{ route('editUser', ['user' => Auth::user()]) }}"><i class="fa fa-fw fa-gear"></i> Edit Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-fw fa-power-off"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>