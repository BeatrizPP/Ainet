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
                <td>
                <a href="{{ URL::route('mainByDepartment', $department->id) }}">{{$department->name}}</a>
                </td>
                <?php   $hasUsers = false;  ?>  <!--(FIXED) if the user list doesn't have a department he doesn't write-->
                @foreach ($printsPerDepartment as $prints)
                    @if ($prints->department_id == $department->id)
                        <td> 
                        {{$prints->sum}}
                        <?php   $hasUsers = true; ?>
                        </td>
                    @endif
                @endforeach
                @if (!$hasUsers) 
                        <td> 0 </td>
                        <?php   $hasUsers = false;  ?>
                    @endif
            </tr> 
        @endforeach
        </table>
    </p>
    @if ($isDepSelected)
        <p>Total Prints by Department: {{$sumPrintsPerDepartment}}</p>
        <p>Percentage of colored requests of said Department: {{$percColoredByDepartment}} %</p>
        <p>Total of prints made today for said Department: {{$depToday}}</p>
        <p>Total of prints made today for said Department: {{$depMonth}}</p>
    @endif
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
