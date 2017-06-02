
@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'My Requests'))
@endsection

@section('content')

                {{--Show Requests--}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Request Id</th>
                                    <th>Status</th>
                                    <th>Due Date</th>
                                    <th>Owner</th>
                                    <th>+ Info</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($printRequests as $request)

                                    <tr>
                                        <td>{{ $request->id }}</td>
                                        <td>
                                            @if($request->status == 0)
                                                pending
                                            @elseif($request->status == 1)
                                                refused
                                            @else
                                                closed
                                            @endif
                                        </td>
                                        <td>{{ $request->due_date }}</td>
                                        <td>{{ $request->owner->name }}</td>
                                        <td><a href="/request-description/{{ $request->id }}">View Details</a></td>
                                        <td><a href="#">Delete</a></td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
