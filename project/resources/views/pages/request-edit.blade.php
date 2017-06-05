@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Edit Request'))
@endsection


@section('content')

    <div id="request-form">

        <form method="POST" action="{{route ('updateRequest')}}">

            {{ csrf_field() }}

            <div class="col-lg-6">
                <input  id="hiddenId" name="hiddenId" type="hidden" value="{{ $printRequest->id }}">
                <div class="form-group">
                    <label for="file">Upload File</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>

                <div class="form-group">
                    <label for="name">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" value = "{{$printRequest->description}}">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value = "{{$printRequest->quantity}}">
                </div>

                <div class="form-group">
                    <label for="paper_size">Paper Size</label>
                    <select class="form-control" id="paper_size" name="paper_size">
                        <option  selected value ="{{$printRequest->paper_size}}"> Your current size of paper is: {{$printRequest->paper_size}} </option>
                        <option value="4">A4</option>
                        <option value="3">A3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="paper_size">Paper Type</label>
                    <select class="form-control" id="paper_size" name="paper_type">
                        <option  selected value ="{{$printRequest->paper_type}}"> Your current type of paper is: {{$printRequest->paper_type}} </option>
                        <option value="0">Draft</option>
                        <option value="1">Regular</option>
                        <option value="2">Photographic</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6">

                <div class="form-group">
                    <label for="due_date">Due date:</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" value = "{{$printRequest->due_date}}">
                </div>

                <div class="form-group">
                    <label>Additional Options</label>
                    <div class="checkbox">
                        <label for="colored">
                            <input type="checkbox" value="{{$printRequest->colored}}" id="colored" name="colored">Colored
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="stapled">
                            <input type="checkbox" value="{{$printRequest->stapled}}" id="stapled" name="stapled">Stapled
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="front_back">
                            <input type="checkbox" value="{{$printRequest->front_back}}" id="front_back" name="front_back">Front-back
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-default"> Submit Request</button>
                </div>

                @include('layouts.partials.errors')

            </div>
        </form>

    </div>


@endsection
