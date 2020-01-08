@foreach($profile as $row)
<div class="col-md-4 p-4 ">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('public/storage/users/'.$row->profile_pic) }}"
            alt="Card image cap">
        <div class="card-body">
            <p class="card-text">{{ $row->description }}
            </p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Price: </strong><span
                    style="color:green">{{ $row->price }}</span></li>
            <li class="list-group-item"><strong>Country: </strong><span
                    style="color:green">{{ $row->country }}</span></li>
            <li class="list-group-item"><strong>Department: </strong><span
                    style="color:green">{{ $row->department }}</span></li>

            <li class="list-group-item"><strong>Social Network</strong>
                @if($row->is_facebook === 1)
                <a href="#"><img src="{{asset('public/assets/images/facebook.png')}}" /></a>
                @endif

                @if($row->is_instagram === 1)
                <a href="#"><img src="{{asset('public/assets/images/instagram.png')}}" /></a>
                @endif

                @if($row->is_twitter === 1)
                <a href="#"><img src="{{asset('public/assets/images/twitter.png')}}" /></a>
                @endif
            </li>
        </ul>
    </div>
</div>
@endforeach