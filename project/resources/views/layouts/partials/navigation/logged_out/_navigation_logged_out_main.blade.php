<div id="wrapper">
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::route('main') }}">Ainet Print Management</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a class="navbar-signup" href="#" style="font-size: 100%;"><i class="fa fa-fw fa-edit"></i>Sign up</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Log In <b class="caret"></b></a>
            <ul class="dropdown-menu login-dropdown">
                <form action="/action_page.php">
                    <li>
                        <label><p>Email:</p></label>
                        <input type="email" placeholder="Enter Email" name="email" size="29" required>
                    </li>
                    <li>
                        <label><p>Password:</p></label>
                        <input type="password" placeholder="Enter Password" name="psw" size="24" required>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <button type="submit" style="float: right"><i class="fa fa-fw fa-power-off"></i> Log In</button>
                    </li>
                    <li>
                        <input type="checkbox" checked="checked"> Remember me
                    </li>
                    <li>
                        <span class="psw">Forgot <a href="#">password?</a></span>
                    </li>
                </form>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="{{ URL::route('main') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li>
                <a href="{{ URL::route('listAllRequests') }}"><i class="fa fa-list-ul" aria-hidden="true"></i> Print Requests</a>
            </li>
            <li>
                <a href="{{ URL::route('contacts') }}"><i class="fa fa-users" aria-hidden="true"></i> Contacts</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>