@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All the Machines <a class="btn btn-small btn-success pull-right" href="{{ URL::to('machines/create') }}"><i class="fa fa-plus" title="Add new"></i></a></h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Brand (Vendor) Model<br>Type</th>
                <th>Bought at</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($machines as $key => $value)
                <tr>
                    <td>{{ $value->brand }}{{ $value->vendor ? ' (' . $value->vendor . ')' : '' }} {{ $value->model }}<br>{{ ucfirst($value->type) }}</td>
                    <td>{{ $value->bought_at }}</td>
                    <td>{{ $value->location->name }}</td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the location (uses the destroy method DESTROY /machines/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        {{ Form::open(array('url' => 'machines/' . $value->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{-- Form::submit('<i class="fa fa-trash-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger')) --}}
                            {!!  Form::faSubmit('danger', 'trash-o') !!}
                        {{ Form::close() }}

                        <!-- show the location (uses the show method found at GET /machines/{id} -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('machines/' . $value->id) }}"><i class="fa fa-eye" title="View"></i></a>

                        <!-- edit this location (uses the edit method found at GET /machines/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('machines/' . $value->id . '/edit') }}"><i class="fa fa-pencil" title="Edit"></i></a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection