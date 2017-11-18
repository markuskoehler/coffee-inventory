@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Showing Machine: {{ $machine->brand }} {{ $machine->model }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $machine->brand }}{{ $machine->vendor ? ' (' . $machine->vendor . ')' : '' }} {{ $machine->model }}</h2>
            <p>
                <strong>Type:</strong> {{ ucfirst($machine->type) }}<br>
                @if($machine->bought_at)
                <strong>Bought at:</strong> {{ $machine->bought_at }}<br>
                @endif
                <strong>Location:</strong> {{ $machine->location->name }}, {{ $machine->location->address }}, {{ $machine->location->zip }} {{ $machine->location->place }} ({{ $machine->location->room }})
            </p>
        </div>
    </div>
@endsection