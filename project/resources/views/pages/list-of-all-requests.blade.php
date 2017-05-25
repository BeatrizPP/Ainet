
@extends('layouts.master')

@section('navigation')
        @include('layouts.partials.navigation.logged_in._navigation_list_all_requests')
@endsection

@section('header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        All Requests <small>some subtitle</small>
                    </h1>
                </div>
            </div>
@endsection



@section('content')

                {{--Filter Requests--}}
                <div class="well">
                    <div data-toggle="collapse" data-target="#request-filters">
                        <h4>Filter by: <i class="fa fa-fw fa-caret-down" style="float: right"></i></h4>
                    </div>
                    <form method="GET">

                        <div id="request-filters" class="collapse">

                            <div class="form-group">
                                <label>Status:</label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInlinePendent" value="pendent">Pendent
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInlineCompleted" value="completed">Completed
                                </label>
                            </div>

                            <div class="form-group">
                                <label>Owner:</label>
                                <select class="form-control">
                                    <option>All</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Department:</label>
                                <select multiple class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Creation date:</label>
                                <input type="date" name="date">
                            </div>


                            <div class="form-group">
                                <label>Expression:</label>
                                <input type="text" name="name">
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