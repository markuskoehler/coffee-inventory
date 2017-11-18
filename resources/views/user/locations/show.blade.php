@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Showing Location: {{ $location->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $location->name }}</h2>
            <p>
                {{ $location->address }}, {{ $location->zip }} {{ $location->place }}<br>
                <strong>Room:</strong> {{ $location->room }}
            </p>
        </div>
    </div>
@endsection