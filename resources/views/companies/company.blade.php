@extends('layouts.app')

@section('page_title')
    <span>{{$city->name}} - {{$company->name}}</span>
@endsection

@section('content')
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-2">
                    <img class="thumbnail" src="{{$company->image}}"/>
                </div>
                <div class="col-10">
                    <h1>Description</h1>
                    <p>{{$company->description}}</p>
                </div>
            </div>
        </div>
        <h1>Rooms</h1>
        @foreach($company->rooms as $room) 
            @component('components.room-row', ['room' => $room, 'hideCompanyLink' => true])
            @endcomponent
        @endforeach
    </div>
@endsection