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
            <a class="btn btn-primary" href="{{$room->bookingLink}}">Book now</a>
        </div>
    </div>
</div>