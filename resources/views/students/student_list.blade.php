<div class="col-sm-3">
    <div class="row">
        <div class="col-sm-9">
            <h4>Students</h4>
            <!-- ->toFormattedDateString()-->
        </div>
        <div class="col-sm-3">
            <button class="btn btn-success" href="/students/create">+</button>
        </div>
    </div>
    <hr>
    @foreach($students as $student)

        <a href="/students/{{$student->id}}">
            <div class="card">
                <div class="row">
                    <div class="col-sm-6 card-img">
                        <img src="/storage/uploads/{{$student->img}}" class="rounded-circle float-left" width="50px" height="50px">
                    </div>
                    <div class="col-sm-6 card-body">
                        {{$student->name}}
                        {{$student->phone}}
                    </div>
                </div>

            </div>
        </a>

    @endforeach
</div>