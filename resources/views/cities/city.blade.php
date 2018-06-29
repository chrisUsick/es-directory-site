@extends('layouts.app')

@section('page_title')
    <span>{{$city->name}}</span>
@endsection

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    

    <div class="container">
        <div class="content">
            <div class="mx-auto" style="width:200px">
                <ul class="nav nav-tabs" id="tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="companies-tab" data-toggle="tab" href="#companies" role="tab">Companies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="rooms-tab" data-toggle="tab" href="#rooms" role="tab">Rooms</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="tab-content">
                <div class="tab-pane fade show active" id="companies" role="tabpanel" aria-labelledby="companies-tab">
                    <div class="container">
                        @foreach ($companies as $company)
                            <div class="row company-row">
                                <div class="col-2">
                                    <img src="{{$company->image}}" />
                                </div>
                                <div class="col-6">
                                    <h3>{{$company->name}}</h3>
                                    <p>{{$company->description}}</p>
                                    <span>Number of rooms: {{$company->rooms_count}}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                </div>
                <div class="tab-pane fade" id="rooms" role="tabpanel" aria-labelledby="rooms-tab">
                    <p>rooms</p>
                </div>
            </div>
        </div>
    </div>

@endsection

