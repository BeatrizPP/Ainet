@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Statistics Overview'))
@endsection

@section('content')

    @if (Session::has('status'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="fa fa-info-circle"></i> {{ Session::get('status') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading" style="height: 110px">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-print fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$totalPrints}}</div>
                            <div><br>Total prints:</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading" style="height: 110px">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-calendar-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$today}}</div>
                            <div><br>Prints today:</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading" style="height: 110px">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-calendar fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$month}}</div>
                            <div><br>Prints this month:</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red" style="height: 110px">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-line-chart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$monthAvg}}</div>
                            <div>Average prints<br>per day this month:</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Total of Prints by Department</h3>
                </div>
                <div class="panel-body">
                    <div id="morris-bar-chart" style="height: 300px; padding-bottom:50px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Color vs B&W Prints</h3>
                </div>
                <div class="panel-body">
                    <div id="morris-donut-chart" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Stats by Department</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach ($departments as $department)
                            <a href="{{ URL::route('mainByDepartment', $department->id) }}" class="list-group-item">
                                <i class="fa fa-fw fa-print"></i> {{$department->name}}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            @if ($isDepSelected)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Departamento de {{$depName}} </h3>
                    </div>
                    <div class="panel-body">
                        <p>Total of prints for this department: {{$sumPrintsPerDepartment}}</p>
                        <p>Color prints: {{$percColoredByDepartment}} %</p>
                        <p>Total of prints today: {{$depToday}}</p>
                        <p>Total of prints this month: {{$depMonth}}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection

@section('graphs')
    <script>
        $(function() {
            // Donut Chart
            Morris.Donut({
                element: 'morris-donut-chart',
                data: [{
                    label: "Color",
                    value: {{$percentageColored}}
                }, {
                    label: "Black & White",
                    value: 100 - {{$percentageColored}}
                }],
                resize: true,
                labelColor: '#2c2f31',
                colors: [
                    'orange',
                    '#2c2f31'
                ],
                formatter: function (x) { return "" + Math.floor(x*{{$totalPrints}}/100) + " (" + x + "%)"}
            });

            // Bar Chart
            Morris.Bar({
                element: 'morris-bar-chart',
                data: [
                    @foreach ($departments as $department)
                        {x: '{{$department->name}}', y:
                        @foreach ($printsPerDepartment as $print)
                            @if ($print->department_id == $department->id)
                                {{$print->sum}} },
                            @endif
                        @endforeach
                    @endforeach
                ],
                resize: true,
                xkey: 'x',
                ykeys: 'y',
                labels: ['Prints'],
                xLabelAngle: 45,
                barColors: function (row, series, type) {
                    if (type === 'bar') {
                        var red = Math.ceil(255 * row.y / this.ymax);
                        return 'rgb(200,'+ red + ',30)';
                    }
                    else {
                        return '#000';
                    }
                }
            });
        });
    </script>
@endsection