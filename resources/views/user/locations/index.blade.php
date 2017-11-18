@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All the Locations <a class="btn btn-small btn-success pull-right" href="{{ URL::to('locations/create') }}"><i class="fa fa-plus" aria-hidden="true"></i></a></h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Address</td>
                <td>Room</td>
                <td>Actions</td>
            </tr>
            </thead>
            <tbody>
            @foreach($locations as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->address }}<br>{{ $value->zip }} {{ $value->place }}</td>
                    <td>{{ $value->room }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the location (uses the destroy method DESTROY /locations/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'locations/' . $value->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{-- Form::submit('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger')) --}}
                            {!!  Form::faSubmit('danger', 'trash-o') !!}
                        {{ Form::close() }}

                        <!-- show the location (uses the show method found at GET /locations/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('locations/' . $value->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>

                        <!-- edit this location (uses the edit method found at GET /locations/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('locations/' . $value->id . '/edit') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection