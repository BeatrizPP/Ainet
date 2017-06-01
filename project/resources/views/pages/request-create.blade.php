@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'New Print Request'))
@endsection


@section('content')

    <div id="request-form">

        <form method="POST" action="/request-create" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="file">Upload File</label>
                        <input type="file" id="file" name="file">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="name">Description:</label>
                        <textarea class="form-control" rows="7" id="description" name="description"></textarea>
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
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" min="1" class="form-control" id="quantity" name="quantity">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="paper_size">Paper Size</label>
                        <select class="form-control" id="paper_size" name="paper_size">
                            <option value="4">A4</option>
                            <option value="3">A3</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="paper_type">Paper Type</label>
                        <select class="form-control" id="paper_type" name="paper_type">
                            <option value="0">Draft</option>
                            <option value="1">Regular</option>
                            <option value="2">Photographic</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4"></div>
                <div class="col-lg-2">
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default"> <b>Submit Request</b></button>
                    </div>
                </div>
            </div>

            @include('layouts.partials.errors')

        </form>
    </div>

@endsection
