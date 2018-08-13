<div class="col-sm-3">
    <div class="row">
        <div class="col-sm-9">
            <h4>Courses</h4>
            <!-- ->toFormattedDateString()-->
        </div>
        <div class="col-sm-3">
            <a href="/courses/create" class="btn btn-success">+</a>
        </div>
    </div>
    <hr>
    @foreach($courses as $course)

        <a href="/courses/{{$course->id}}" class="list-group-item list-group-item-action" role="tab">
            <div class="card bg-light font-weight-bold text-dark">
                <div class="row">
                    <div class="col-sm-3 card-img m-auto pl-4">
                        <img src="/storage/uploads/{{$course->img}}" class="rounded-circle float-left" width="50px" height="50px">
                    </div>
                    <div class="col-sm-9 card-body">
                        {{$course->name}}
                    </div>
                </div>

            </div>
        </a>

    @endforeach
</div>