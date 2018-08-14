<div class="col-sm-3">
    <div class="row">
        <div class="col-sm-9">
            <h2>Students</h2>
            <!-- ->toFormattedDateString()-->
        </div>
        <div class="col-sm-3">
            <a href="/students/create" class="btn btn-success">+</a>
        </div>
    </div>
    <hr>
    <ul class="list-group" style="overflow-y: scroll; height: 500px">
        @foreach($students as $student)
            <a href="/students/{{$student->id}}" class="list-group-item list-group-item-action" role="tab">
                <div class="card bg-light font-weight-bold text-dark">
                    <div class="row">
                        <div class="col-sm-3 card-img m-auto pl-4">
                            <img src="/storage/uploads/{{$student->img}}" class="rounded-circle float-left" width="50px"
                                 height="50px">
                        </div>
                        <div class="col-sm-9 card-body">
                            {{$student->name}}
                            {{$student->phone}}
                        </div>
                    </div>

                </div>
            </a>
        @endforeach
    </ul>
</div>