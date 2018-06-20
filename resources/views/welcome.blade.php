@extends('layouts.app')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
        <h1 class="display-3">Find Escape Rooms In Your City</h1>
        <p>Welcome to the {{$global['title']}}! Select a city to find escape rooms, promotions, and more!</p>
        <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> -->
        <p>
            <city-selector v-bind:cities="{{$cities}}"></city-selector>
        </p>
        </div>
    </div>

    <div class="container">
        <div class="content">
            
        </div>
    </div>

@endsection

