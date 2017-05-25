<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

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

        @if(Auth::check())
            @include('layouts.partials._top_bar_logged_in')
        @else
            @include('layouts.partials._top_bar_logged_out')
        @endif

        @yield('navigation')

        @yield('header')

        {{--@include('layouts.partials._header')--}}

        @yield('content')

        @include('layouts.partials._footer')

    </body>
</html>
