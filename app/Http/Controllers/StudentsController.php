<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Student;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager',['except' => ['index','show','edit','update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // /students

        $students = Student::studentsList();

        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // /students/create

        return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // POST /students

        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|min:8',
            'phone' => 'required|min:10',
            'img' => 'required|max:1999'
        ]);

        $this->imageValidate($request);

        //create student
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->img = $this->imageValidate($request);
        $student->save();

        $courses_add = array($request->input('course'));

        foreach ($courses_add as $course) {
            # code...
            if ($course)
            {
                $course = Course::find($course);
                $student->courses()->attach($course);
            }

        }

        return redirect('/theschool')->with('success', 'Student created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        // GET /students/id
        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2',
            'email' => 'required|min:8',
            'phone' => 'required|min:10',
            'img' => 'required|max:1999'
        ]);

        $this->imageValidate($request);

        //create student
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        if ($request->hasFile('img')) {
            $student->img = $this->imageValidate($request);;
        }
        $student->save();

        $courses_add = array($request->input('course'));

        foreach ($courses_add as $course) {
            # code...
            if ($course)
            {
                $course = Course::find($course);
                $student->courses()->sync($course);
            }

        }

        return redirect('/theschool')->with('success', 'Student Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student->img != 'default.png') {
            //delete img
            Storage::delete('public/uploads/' . $student->img);

        }
        $student->delete();
        return redirect('/theschool')->with('success', 'Student Deleted');
    }
}
