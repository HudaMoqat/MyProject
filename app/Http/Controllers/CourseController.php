<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = session('teacherUsers') ?: session('studentUsers') ?: User::all();
        if($users[0]->is_teacher==1){
            return view('teacher/courses/index',compact('users'));
        }else{
            return view('student/courses/index',compact('users'));
        }
    }
    public function teachersIndex()
    {
        $teachers = User::where('is_teacher', 1)->get();
        session(['teacherUsers' => $teachers]);
        return redirect()->route('teacher_course.index');
    }

    public function studentsIndex()
    {
        $students = User::where('is_teacher',0)->get();
        session(['studentUsers' => $students]);
        return redirect()->route('course.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin/courses/add_course');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseStoreRequest $request)
    {
//        dd($request);
        $course=new Course();
        $course->name=$request->name;
        $course->save();
        return back()->with('success','The Course has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $assignments=Assignment::withTrashed()->get();
        return view('teacher/courses/edit',compact('course','assignments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseUpdateRequest $request, Course $course)
    {
//        dd($request->toArray());
        $course->assignments()->delete($course->assignments);
        $course->name=$request->name;
        $course->save();
        $assignment_ids= $request->input('assignment_id');
        foreach ($assignment_ids as $assignment_id){
            $assignment_id=(int)$assignment_id;
            $assignment=Assignment::withTrashed()->find($assignment_id);
            $course->assignments()->create([
                'title' => $assignment->title,
                'due_date'=>$assignment->due_date,
                'details'=>$assignment->details
            ]);
        }
        return redirect()->route('teacher_course.index')->with('success','The Course Assignment has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        Auth::user()->courses()->detach($course);
        $course->assignments()->forceDelete();
        return redirect()->back()->with('success','The Course has been deleted successfully');
    }
}
