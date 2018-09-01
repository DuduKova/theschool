<a href="/courses/{{$course->id}}" class="list-group-item list-group-item-action" role="tab">
    <div class="card bg-light font-weight-bold text-dark">
        <div class="row">
            <div class="col-sm-5 card-img m-auto pl-4">
                <img src="/storage/uploads/{{$course->img}}" class="rounded-circle float-left profile-pic">
            </div>
            <div class="col-sm-7 card-body">
               <h5>{{ucfirst($course->name)}}</h5>
            </div>
        </div>

    </div>
</a>