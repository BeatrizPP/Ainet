
@extends('layouts.master')

@section('header')
    @include('layouts.partials._header', array('title'=>'Edit Profile'))
@endsection


@section('content')
    <div id="user-form">
        <form method="POST" action="{{route ('updateUser')}}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="row">
                <div class="col-lg-6">
                    <input  id="hiddenId" name="hiddenId" type="hidden" value="{{ $user->id }}">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value = "{{$user->name}}" required>
                    </div>

                    <div class="form-group">
                        <label for="presentation">Presentation:</label>
                        <textarea class="form-control" rows="5" id="presentation" name="presentation">{{$user->presentation}}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value = "{{$user->email}}" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" >
                    </div>

                    <div class="form-group">
                        <label>Verify Password:</label>
                        <input type="password" class="form-control" >
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="form-group" >
                        <img class="img-thumbnail" src = "/profiles/{{$user->profile_photo}}" style = "width: 150px; height: 150px; " >
                        <br>
                        <br>
                        <label>Upload Photo</label>
                        <input type="file" name="avatar">
                        <input type="hidden" name="_token" value = "{{ csrf_token() }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input class="form-control" id="phone" name="phone" value = "{{$user->phone}}" required>
                    </div>

                    <div class="form-group">
                        <label for="department">Department</label>
                        <select class="form-control" id="department" name="department">
                            @if(Auth::check())
                                <option  selected value ="{{$user->department_id}}"> Your current department is: {{$user->department->name}} </option>
                            @endif
                            @foreach($departments as $department)
                                <option value = "{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" value = "{{$user->profile_url}}">
                        <label>Link to external profile page:</label>
                        <input class="form-control" name ="profile_url">
                    </div>
                </div>
            </div>
            <div class="row" style="float: right">
                <br>
                <a href="{{ route('profilePage', ['user' => Auth::user()]) }}" class="btn btn-default" role="button">Cancel</a>
                <button type="submit" class="btn btn-default" style="width:100px"> <b>Save</b></button>
                &emsp;
            </div>
        </form>
    </div>
    <div class="row"><br><br><br><br></div>
@endsection