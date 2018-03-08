@extends('layouts.app')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">{{ $city->name}} | Escape Room World</h1>
            <p>{{ $city->description }}</p>
        </div>
    </div>

    <div class="container">
        <div class="content">
            
        </div>
    </div>

@endsection

