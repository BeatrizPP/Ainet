@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Request Description'))
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