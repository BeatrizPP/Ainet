<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Projeto Ainet</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://project.ainet/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://project.ainet/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="http://project.ainet/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://project.ainet/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- links to fonts?-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body id="page-top" class="index">

        <!-- top bar -->
        @if(Auth::check())
            @include('layouts.partials._top_bar_logged_in')
        @elseif(Request::url() === route('register'))
            @include('layouts.partials._top_bar_registration')
        @else
            @include('layouts.partials._top_bar_logged_out')
        @endif

        <!-- side bar navigation -->
        @if(Auth::check())
            @if(Request::url() === route('personalRequests'))
                @include('layouts.partials.navigation.logged_in._navigation_personal_requests')
            @elseif(Request::url() === route('listAllRequests'))
                @include('layouts.partials.navigation.logged_in._navigation_list_all_requests')
            @elseif(Request::url() === route('contacts'))
                @include('layouts.partials.navigation.logged_in._navigation_contacts')
            @elseif(Request::url() === route('main'))
                @include('layouts.partials.navigation.logged_in._navigation_main')
            @elseif(Request::url() === route('requestCreate'))
                @include('layouts.partials.navigation.logged_in._navigation_create_request')
            @else
                @include('layouts.partials.navigation.logged_in._navigation_logged_in')
            @endif
        @else
            @if(Request::url() === route('main'))
                @include('layouts.partials.navigation.logged_out._navigation_logged_out_main')
            @elseif(Request::url() === route('contacts'))
                @include('layouts.partials.navigation.logged_out._navigation_logged_out_contacts')
            @else
                @include('layouts.partials.navigation.logged_out._navigation_logged_out')
            @endif
        @endif

        @yield('header')

        @yield('content')

        @include('layouts.partials._footer')

    </body>
</html>
