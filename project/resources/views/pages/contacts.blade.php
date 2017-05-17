
@extends('layouts.master')

@section('navigation')
    @if(Auth::check())
        @include('layouts.partials.navigation.logged_in._navigation_contacts')
    @else
        @include('layouts.partials.navigation.logged_out._navigation_logged_out_contacts')
    @endif
@endsection

@section('header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Contacts <small>some subtitle</small>
                    </h1>
                </div>
            </div>
@endsection

@section('content')

                <ul>
                    @foreach($users as $user)

                        <li> {{ $user->name }}
                            <ul>

                                <li> Email: {{ $user->email }} </li>

                                @if($user->phone != null)
                                    <li>Phone: {{ $user->phone }}</li>
                                @endif

                            </ul>
                            <br>
                        </li>

                    @endforeach
                </ul>


@endsection