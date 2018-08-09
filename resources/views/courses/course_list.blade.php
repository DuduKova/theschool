<div class="col-sm-3">
    <div class="row">
        <div class="col-sm-9">
            <h4>Courses</h4>
            <!-- ->toFormattedDateString()-->
        </div>
        <div class="col-sm-3">
            <button class="btn btn-success" href="/courses/create">+</button>
        </div>
    </div>
    <hr>
    @foreach($courses as $course)

        <a href="/courses/{{$course->id}}">
            <div class="card">
                <div class="row">
                    <div class="col-sm-6 card-img">
                        <img src="/storage/uploads/{{$course->img}}" class="rounded-circle float-left" width="50px" height="50px">
                    </div>
                    <div class="col-sm-6">
                        {{$course->name}}
                    </div>

                </div>

            </div>
        </a>

    @endforeach
</div>