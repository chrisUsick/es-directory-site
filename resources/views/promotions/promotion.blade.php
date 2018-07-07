@extends('layouts.app')

@section('page_title')
    <span>{{$promotion->name}}</span>
@endsection

@section('content')
    <div class="container">
        <div class="content">
            <promo-code-generator :promotion-id="{{$promotion->id}}"></promo-code-generator>
        </div>
    </div>
@endsection