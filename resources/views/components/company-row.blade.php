<div class="row item-row">
    <div class="col-2">
        <img src="{{$company->image}}" />
    </div>
    <div class="col-6">
        <h3>
            <a href="{{action('CompanyController@Show', ['citySlug' => $city->slug, 'companySlug' => $company->slug])}}">{{$company->name}}</a>
        </h3>
        <p>{{$company->description}}</p>
        <span>Number of rooms: {{$company->rooms_count}}</span>
    </div>
</div>