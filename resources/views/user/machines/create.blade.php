@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a Machine</h1>

        <!-- if there are creation errors, they will show here -->
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'machines')) }}

        <div class="form-group">
            {{ Form::label('vendor', 'Vendor') }}
            {{ Form::text('vendor', request()->old('vendor'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('brand', 'Brand') }}
            {{ Form::text('brand', request()->old('brand'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('model', 'Model') }}
            {{ Form::text('model', request()->old('model'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('type', 'Type') }}
            {{ Form::select('type', [0 => 'Please select', 'beans' => 'Beans', 'capsules' => 'Capsules', 'instant' => 'Instant', 'pads' => 'Pads'], request()->old('type'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('bought_at', 'Bought') }}
            {{ Form::date('bought_at', request()->old('bought_at'), array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('location', 'Location') }}
            {{ Form::select('location', App\Models\Location::all()->pluck('name', 'id'), request()->old('location'), array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
@endsection