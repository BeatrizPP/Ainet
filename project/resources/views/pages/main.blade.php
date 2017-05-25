@extends('layouts.master')

@section('navigation')
    @if(Auth::check())
        @include('layouts.partials.navigation.logged_in._navigation_main')
    @else
        @include('layouts.partials.navigation.logged_out._navigation_logged_out_main')
    @endif
@endsection

@section('header')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Home <small>Statistics Overview</small>
                    </h1>
                </div>
            </div>
@endsection

            @section('content')

                <p>Total prints: {{$totalPrints}}</p>
                <p>Percentage of colored prints: {{$percentageColored}} %</p>
                <p>prints by department:
                <table>
                    @foreach ($departments as $department)
                        <tr>
                            <td>{{$department->name}}</td>
                            @foreach ($printsPerDepartment as $prints)
                                @if ($prints->department_id == $department->id)
                                    <td> {{$prints->sum}}</td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
                </p>
                <p>Prints today:{{$today}}</p>
                <p>Prints this month:{{$month}}</p>
                <p>List of contacts:
                <table>
                    <tr>
                        <th>
                            Photo
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Total prints
                        </th>
                        <th>
                            Department
                        </th>
                    </tr>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>
                                @if ($contact->profile_photo == null)

                                    <img src="/profiles/no-profile-image.jpg" style="width:60px; height: 60px;">
                                    <!-- also would work with the migration of using this image as default-->
                                @else
                                    <img src="/profiles/{{ $contact->profile_photo }}" style="width:60px; height: 60px;">
                                @endif
                            </td>
                            <td>
                                {{$contact->name}}
                            </td>
                            <td>
                                {{$contact->email}}
                            </td>
                            <td>
                                {{$contact->print_counts}}
                            </td>
                            <td>
                                {{$contact->department_id}}
                            </td>
                        </tr>
                    @endforeach
                </table>
                </p>

@endsection
