@extends('layouts.master')

@section('container')

    <h1>Create course</h1>

    <form method="POST" action="/">
        @csrf
        <div class="form-group">
            <label for="courseName">Name</label>
            <input type="text" class="form-control" id="courseName" name="name" placeholder="Enter name" required>
        </div>
        <div class="form-group">
            <label for="courseDescription">Description</label>
            <input type="text" class="form-control" id="courseDescription" name="description" placeholder="Enter Description"
                   required>
        </div>
        <div class="form-group">
            <label for="coursePic">Picture</label>
            <input type="file" name="img" class="form-control" id="coursePic" placeholder="Enter email" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    @include('layouts.errors')

@endsection
