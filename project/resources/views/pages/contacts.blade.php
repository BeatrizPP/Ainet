
@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Contacts'))
@endsection

@section('content')

                <ul>
                    @foreach($users as $user)

                        <li><a href="/profile-page/{{$user->id}}"> {{ $user->name }} </a>
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