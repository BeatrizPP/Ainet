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
                        Request Description <small>some subtitle</small>
                    </h1>
                </div>
            </div>
@endsection



@section('content')

    <p>
        Id:
        {{$printRequest->id}}
    </p>

    <p>
        Status:
        {{$printRequest->status}}
    </p>

    <p>
        Description:
        {{$printRequest->description}}
    </p>

    <p>
        Due Date:
        {{$printRequest->due_date}}
    </p>

    <p>
        Quantity:
        {{$printRequest->quantity}}
    </p>

    <p>
        Paper Size:
        A{{$printRequest->paper_size}}
    </p>

    <p>
        Paper Type:
        {{$printRequest->paper_type}}
    </p>

    <p>
        Owner Id:
        {{$printRequest->owner_id}}
    </p>

    <p>
        Due Date:
        {{$printRequest->due_date}}
    </p>

    <p>
        Colored:
        {{$printRequest->colored}}
    </p>

    <p>
        Stapled:
        {{$printRequest->stapled}}
    </p>








@endsection