@extends('layouts.master')

@section('container')


    <h1>Create student</h1>

    <form method="POST" action="/">
        @csrf
        <div class="form-group">
            <label for="studentFirstName">First Name</label>
            <input type="text" class="form-control" id="studentFirstName" name="first" placeholder="Enter First Name" required>
        </div>
        <div class="form-group">
            <label for="studentLastName">Last Name</label>
            <input type="text" class="form-control" id="studentLastName" name="last" placeholder="Enter Last Name" required>
        </div>
        <div class="form-group">
            <label for="studentEmail">Email address</label>
            <input type="email" class="form-control" id="studentEmail" name="email" aria-describedby="emailHelp"
                   placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="studentPhone">Phone</label>
            <input type="number" class="form-control" id="studentPhone" name="phone" placeholder="Enter phone" required>
        </div>
        <div class="form-group">
            <label for="studentPic">Picture</label>
            <input type="file" name="img" class="form-control" id="studentPic" placeholder="Enter email" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    @include('layouts.errors')



@endsection