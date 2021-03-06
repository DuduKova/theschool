<div class="col-sm-3">
    <div class="row">
        <div class="col-sm-9">
            <h2>Admins</h2>
            <!-- ->toFormattedDateString()-->
        </div>
        <div class="col-sm-3">
            <a href="/users/create" class="btn btn-success">+</a>
        </div>
    </div>
    <hr>
    <ul class="list-group my-list" id="list-tab" role="tablist">

    @foreach($users as $user)

        @if(Auth::user()->role !== 'Owner' && $loop->first)

            @else

        <a href="/users/{{$user->id}}" class="list-group-item list-group-item-action" role="tab">
            <div class="card bg-light font-weight-bold text-dark">
                <div class="row">
                    <div class="col-sm-3 card-img m-auto pl-4">
                        <img src="/storage/uploads/{{$user->img}}" class="rounded-circle float-left profile-pic">
                    </div>
                    <div class="col-sm-9 card-body">
                        <h5>{{ucfirst($user->name)}}, {{ucfirst($user->role)}}</h5>
                        <h6>{{$user->phone}}</h6>
                        <h6>{{$user->email}}</h6>
                    </div>
                </div>

            </div>
        </a>

            @endif

    @endforeach
    </ul>
</div>