<div class="row item-row">
    <div class="col-2">
        <img src="{{$room->image}}" />
    </div>
    <div class="col-10">
        <h3>{{$room->name}}</h3>
        <p>{{$room->description}}</p>
        <div class="d-flex justify-content-between align-items-center">
            <span>Difficulty: {{$room->difficulty}}</span>
            <span>Address: {{$room->address}}</span>
            @unless (isset($hideCompanyLink) && $hideCompanyLink) 
                <a class="btn btn-secondary" href="{{action('CompanyController@Show', ['citySlug' => $room->city->slug, 'companySlug' => $room->company->slug])}}">View Company</a>
            @endunless
            <a class="btn btn-primary" href="{{$room->bookingLink}}">Book now</a>
        </div>
    </div>
</div>