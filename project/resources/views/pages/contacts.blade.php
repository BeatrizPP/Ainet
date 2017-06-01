
@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Contacts'))
@endsection

@section('content')

    {{--Show Contacts--}}
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>+ Info</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)

                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->phone != null)
                                    {{ $user->phone }}
                                @endif
                            </td>
                            <td><a href="/profile-page/{{$user->id}}">View Details</a></td>
                        </tr>

                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="pagination"> {{ $users->links() }} </div>
        </div>
    </div>

@endsection