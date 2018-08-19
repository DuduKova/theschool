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
    <ul class="list-group my-list">
        @foreach($students as $student)
            @include('students.student_item')
        @endforeach
    </ul>
</div>