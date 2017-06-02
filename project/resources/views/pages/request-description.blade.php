@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Request Description'))
@endsection



@section('content')

    <div class="row">
        <div class="col-md-6">
            <p style="font-size: 120%"><b>Request id: </b>{{$printRequest->id}}</p>
            <br>
            <p style="font-size: 120%"><b>Status:</b>
                @if($printRequest->status == 0)
                    pendent
                @else
                    completed
                @endif
            </p>
            <br>
            <p style="font-size: 120%"><b>Description: </b>{{$printRequest->description}}</p>
            <br>
            <p style="font-size: 120%"><b>Due Date: </b>{{$printRequest->due_date}}</p>
            <br>
        </div>

        <div class="col-md-6">
            <p style="font-size: 120%"><b>Quantity: </b>{{$printRequest->quantity}}</p>
            <br>
            <p style="font-size: 120%"><b>Paper Size: </b>A{{$printRequest->paper_size}}</p>
            <br>
            <p style="font-size: 120%"><b>Paper Type: </b>
                @if($printRequest->paper_type == 0)
                    Draft
                @elseif($printRequest->paper_type == 1)
                    Regular
                @else
                    Photographic
                @endif
            </p>
            <br>
            <p style="font-size: 120%"><b>Owner: </b>{{$printRequest->owner->name}}</p>
            <br>
            <p style="font-size: 120%"><b>Colored: </b>
                @if($printRequest->colored == 1)
                    <i class="fa fa-check-square-o"></i>
                @else
                    <i class="fa fa-square-o"></i>
                @endif

            <b>&emsp;&ensp;Stapled: </b>
                @if($printRequest->stapled == 1)
                    <i class="fa fa-check-square-o"></i>
                @else
                    <i class="fa fa-square-o"></i>
                @endif

            <b>&emsp;&ensp;Front-back: </b>
                @if($printRequest->front_back == 1)
                    <i class="fa fa-check-square-o"></i>
                @else
                    <i class="fa fa-square-o"></i>
                @endif
            </p>
        </div>
    </div>

@endsection