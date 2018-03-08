@extends('layouts.app')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
        <h1 class="display-3">Escape Room World</h1>
        <p>Welcome to the {{$global['title']}}! Check out the escape rooms in the cities below.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <div class="content">
            <ul>
                @foreach ($cities as $city)
                    <li>
                        <a href="/{{$city->slug}}">{{ $city->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection

