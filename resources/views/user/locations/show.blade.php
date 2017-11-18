@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Showing {{ $location->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $location->name }}</h2>
            <p>
                <strong>Email:</strong> {{ $location->zip }}<br>
                <strong>Level:</strong> {{ $location->address }}
            </p>
        </div>
    </div>
@endsection