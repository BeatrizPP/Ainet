
@extends('layouts.master')

@section('navigation')
        @include('layouts.partials.navigation.logged_in._navigation_personal_requests')
@endsection

@section('header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        My Requests <small>some subtitle</small>
                    </h1>
                </div>
            </div>
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
                                    <th>Owner Id</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($printRequests as $request)

                                    <tr>
                                        <td>{{ $request->id }}</td>
                                        <td>
                                            @if($request->status == 0)
                                                pendent
                                            @else
                                                completed
                                            @endif
                                        </td>
                                        <td>{{ $request->due_date }}</td>
                                        <td>{{ $request->owner_id }}</td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
