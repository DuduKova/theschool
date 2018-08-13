<div class="col-sm-3">
    <div class="row">
        <div class="col-sm-9">
            <h4>Admins</h4>
            <!-- ->toFormattedDateString()-->
        </div>
        <div class="col-sm-3">
            <a href="/users/create" class="btn btn-success">+</a>
        </div>
    </div>
    <hr>
    <div class="list-group" id="list-tab" role="tablist">

    @foreach($users as $user)

        <a href="/users/{{$user->id}}" class="list-group-item list-group-item-action" role="tab">
            <div class="card bg-light font-weight-bold text-dark">
                <div class="row">
                    <div class="col-sm-6 card-img m-auto pl-4">
                        <img src="/storage/uploads/{{$user->img}}" class="rounded-circle float-left" width="50px" height="50px">
                    </div>
                    <div class="col-sm-6 card-body">
                        {{$user->name}}
                        {{$user->phone}}
                    </div>
                </div>

            </div>
        </a>

    @endforeach
    </div>
</div>