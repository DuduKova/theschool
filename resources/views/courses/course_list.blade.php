<div class="col-sm-3">
    <div class="row">
        <div class="col-sm-9">
            <h2>Courses</h2>
            <!-- ->toFormattedDateString()-->
        </div>
        <div class="col-sm-3">
            <a href="/courses/create" class="btn btn-success">+</a>
        </div>
    </div>
    <hr>
    <ul class="list-group my-list">
        @foreach($courses as $course)

         @include('courses.course_item')

        @endforeach
    </ul>
</div>