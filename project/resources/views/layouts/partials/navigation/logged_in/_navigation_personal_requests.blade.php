
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="{{ route('main') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active">
                <a href="{{ route('personalRequests') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{ route('listAllRequests') }}"><i class="fa fa-list-ul" aria-hidden="true"></i> Print Requests</a>
            </li>
            <li>
                <a href="{{ route('contacts') }}"><i class="fa fa-users" aria-hidden="true"></i> Contacts</a>
            </li>
            <li>
                <a href="{{ route('requestCreate') }}"><i class="fa fa-print" aria-hidden="true"></i> New Print Request</a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>