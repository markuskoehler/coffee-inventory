@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit {{ $location->name }}</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::model($location, array('route' => array('locations.update', $location->id), 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', request()->old('name'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('address', 'Street / No') }}
            {{ Form::text('address', request()->old('address'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('place', 'Place') }}
            {{ Form::text('place', request()->old('place'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('zip', 'ZIP') }}
            {{ Form::text('zip', request()->old('zip'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('room', 'Room') }}
            {{ Form::text('room', request()->old('room'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
@endsection