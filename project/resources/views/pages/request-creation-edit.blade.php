@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Request Details'))
@endsection


@section('content')

    <div id="request-form">

        <form method="POST" action="/create-request">

            {{ csrf_field() }}

            <div class="col-lg-6">

                <div class="form-group">
                    <label for="file">Upload File</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>

                <div class="form-group">
                    <label for="name">Description:</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>

                <div class="form-group">
                    <label for="paper_size">Paper Size</label>
                    <select class="form-control" id="paper_size" name="paper_size">
                        <option value="4">A4</option>
                        <option value="3">A3</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="paper_size">Paper Type</label>
                    <select class="form-control" id="paper_size" name="paper_size">
                        <option value="0">Type 0</option>
                        <option value="1">Type 1</option>
                        <option value="2">Type 2</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6">

                <div class="form-group">
                    <label for="due_date">Due date:</label>
                    <input type="date" class="form-control" id="due_date" name="due_date">
                </div>

                <div class="form-group">
                    <label>Additional Options</label>
                    <div class="checkbox">
                        <label for="colored">
                            <input type="checkbox" value="1" id="colored" name="colored">Colored
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="stapled">
                            <input type="checkbox" value="1" id="stapled" name="stapled">Stapled
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="front_back">
                            <input type="checkbox" value="1" id="front_back" name="front_back">Front-back
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
