<a href="/students/{{$student->id}}" class="list-group-item list-group-item-action" role="tab">
    <div class="card bg-light font-weight-bold text-dark">
        <div class="row">
            <div class="col-sm-3 card-img m-auto pl-4">
                <img src="/storage/uploads/{{$student->img}}" class="rounded-circle float-left" width="50px"
                     height="50px">
            </div>
            <div class="col-sm-9 card-body">
                <h6>{{$student->name}}</h6>
                <h6>{{$student->phone}}</h6>
            </div>
        </div>

    </div>
</a>