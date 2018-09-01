<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Course;


class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('manager',['except' => ['index','show']]);
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::coursesList();

        session(['courses' => $courses]);

        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("courses.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // POST /courses

        $this->validate($request, [
            'name' => 'required|min:2',
            'description' => 'required',
            'img' => 'required|max:1999',
        ]);

        $this->imageValidate($request);

        //create course
        $course = new Course;
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->img =  $this->imageValidate($request);
        $course->save();

        session()->forget('courses');

        session()->flash('message', 'Course Saved!');

        return redirect('/theschool');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

        return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('courses.edit')->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'name' => 'required|min:2',
            'description' => 'required',
            'img' => 'max:1999',
        ]);

        //update course
        $course = Course::find($id);
        $course->name =$request->input('name');
        $course->description =$request->input('description');
        if($request->hasFile('img')) {
            if($course->img != 'default.png'){
                //delete img
                Storage::delete('public/uploads/'.$course->img);

            }
            $course->img = $this->imageValidate($request);
        }
        $course->save();

        session()->forget('courses');

        session()->flash('message', 'Course Updated!');

        return redirect('/theschool');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $course = Course::find($id);
        if($course->img != 'default.png'){
            //delete img
            Storage::delete('public/uploads/'.$course->img);

        }
        $course->delete();

        session()->forget('courses');

        session()->flash('message', 'Course Deleted!');

        return redirect('/theschool');
    }

}