
@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'All Requests'))
@endsection

@section('content')

                {{--Filter Requests--}}
                <div class="well">
                    <div data-toggle="collapse" data-target="#request-filters">
                        <h4>Filter by: <i class="fa fa-fw fa-caret-down" style="float: right"></i></h4>
                    </div>
                    <form method="post" action="/filter">
                        {{ csrf_field() }}
                        <div id="request-filters" class="collapse">

                            <div class="form-group">
                                <label>Status:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInlinePendent" value="0">Pendent
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInlineCompleted" value="2">Completed
                                </label>
                                @if(Auth::check() && Auth::user()->isAdmin())
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInlinePendent" value="1">Refused
                                </label>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label>Owner:</label>
                                <select name="ownerName">
                                    <option value="null">------------------------</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user -> id }}">{{ $user -> name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Department:</label>
                                <select multiple class="form-control">
                                    @foreach($departments as $department)
                                        <option name="department" value="{{ $department -> id }}">{{ $department -> name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Creation date:</label>
                                <input type="date" name="date">
                            </div>


                            <div class="form-group">
                                <label>Expression:</label>
                                <input type="text" name="expression">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Apply Filter</button>

                                <button type="reset" class="btn btn-default">Reset Options</button>
                            </div>

                        </div>

                    </form>
                </div>

                <br>
                {{--Show Requests--}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Request Id <a href="{{ URL::route('listAllRequestsOrdered', '0')}}"> <i class="fa fa-arrow-down"></i></a>
                                        <a href="{{ URL::route('listAllRequestsOrdered', '1')}}"><i class="fa fa-arrow-up"></i></a></th>
                                    <th>Status <a href="{{ URL::route('listAllRequestsOrdered', '2')}}"> <i class="fa fa-arrow-down"></i></a>
                                        <a href="{{ URL::route('listAllRequestsOrdered', '3')}}"><i class="fa fa-arrow-up"></i></a></th>
                                    <th>Due Date <a href="{{ URL::route('listAllRequestsOrdered', '4')}}"> <i class="fa fa-arrow-down"></i></a>
                                        <a href="{{ URL::route('listAllRequestsOrdered', '5')}}"><i class="fa fa-arrow-up"></i></a></th>
                                    <th>Owner <a href="{{ URL::route('listAllRequestsOrdered', '6')}}"> <i class="fa fa-arrow-down"></i></a>
                                        <a href="{{ URL::route('listAllRequestsOrdered', '7')}}"><i class="fa fa-arrow-up"></i></a></th>
                                    <th>+ Info</th>
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
                                            completed
                                        @endif
                                    </td>
                                    <td>{{ $request->due_date }}</td>
                                    <td> {{$request->owner->name }}</td>
                                    <td><a href="/request-description/{{ $request->id }}">View Details</a></td>
                                    @if(Auth::user()->isAdmin())
                                        @if($request->status==0)
                                            <td><form method="post" action="/approve">
                                                    {{ csrf_field() }}
                                                    <input  id="hiddenId" name="hiddenId" type="hidden" value="{{ $request->id }}">
                                                    <div class="form-group">
                                                        <label>Printer:</label>
                                                        <select class="form-control">
                                                            <option>------------------------</option>
                                                            @foreach($printers as $printer)
                                                                <option name="printer" value="{{ $printer -> id }}">{{ $printer -> name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <button type="submit" >Approve </button>
                                                </form>
                                            </td>
                                            <td><form method="post" action="/deny">
                                                    {{ csrf_field() }}
                                                    <input  id="hiddenId" name="hiddenId" type="hidden" value="{{ $request->id }}">
                                                    <input name="justification" type="text" placeholder="Reasons for denial">
                                                    <button type="submit" >Deny </button>
                                                </form>
                                        @endif
                                    @endif
                                </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="pagination"> {{ $printRequests->links() }} </div>
                    </div>
                </div>


{{--    <ul>
        @foreach($requests as $request)

            <li> Id: {{ $request->id }}

                <ul>
                    <li> Status:

                        @if($request->status == 0)
                            pendent
                        @else
                            completed
                        @endif
                    </li>

                    <li>Due date: {{ $request->due_date }}</li>

                </ul>

            </li>

        @endforeach
     </ul>--}}


@endsection