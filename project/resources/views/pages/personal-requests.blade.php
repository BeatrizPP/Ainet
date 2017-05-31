
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
                                        <td>{{ $request->owner->name }}</td>
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

@endsection
