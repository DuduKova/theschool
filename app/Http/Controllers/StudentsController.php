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
        $this->middleware('auth');
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

        session(['students' => $students]);

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

        return view("students.edit");
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

        //create student
        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->img = $this->imageValidate($request);
        $student->save();

        $courses_add = array($request->input('course'));

        foreach ($courses_add as $course) {

            if ($course)
            {
                $course = Course::find($course);
                $student->courses()->attach($course);
            }

        }

        session()->forget('students');

        session()->flash('message', 'Student Saved!');

        return redirect('/theschool');

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
            'img' => 'max:1999'
        ]);

        //create student
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        if ($request->hasFile('img')) {
            Storage::delete('public/uploads/' . $student->img);
            $student->img = $this->imageValidate($request);;
        }
        $student->save();

        $courses_add = array($request->input('course'));

        foreach ($courses_add as $course) {

            if ($course)
            {
                $course = Course::find($course);
                $student->courses()->sync($course);
            }

        }

        session()->forget('students');

        session()->flash('message', 'Student Updated!');

        return redirect('/theschool');
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

        session()->forget('students');

        session()->flash('message', 'Student Deleted!');

        return redirect('/theschool');
    }
}
