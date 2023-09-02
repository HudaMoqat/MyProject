<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Course;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = session('teacherUsers') ?: session('studentUsers') ?: User::all();
        session()->forget('teacherUsers');
        session()->forget('studentUsers');
        return view('admin/users/index', compact('users'));
    }

    public function teachersIndex()
    {
        $teachers = User::where('is_teacher', 1)->get();
        session(['teacherUsers' => $teachers]);
        return redirect()->route('user.index');
    }

    public function studentsIndex()
    {
        $students = User::where('is_teacher',0)->get();
        session(['studentUsers' => $students]);
        return redirect()->route('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::all();
        return view('admin/users/add-user',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
//        dd($request);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->is_teacher=$request->isTeacher==1?true:false;

        $user_image=$request->file('user_image');
//        dd($user_image);
        $file_name=$user->name.time().'.'.$user_image->extension();
        $user_image->move('user_images',$file_name);
        $user->image=$file_name;
        $user->save();
        $courseIds =$request->input('course_id');
        $user->courses()->attach($courseIds);
        return redirect()->route('user.index')->with('success','The User has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        $user->courses()->detach($user->courses);
        $courses=Course::all();
        return view('admin/users/edit-user',compact('courses','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
//        dd($request->toArray());
        $user->name=$request->name;
        $user->email=$request->email;
        if (Hash::check($request->current_password, $user->password)) {
            // Update the password if the check is successful
            $user->password = Hash::make($request->new_password);
        } else {
            // Return an error message if the current password is incorrect
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
        if($request->file('image')){
            $user_image=$request->file('image');
            $file_name=$user->name.time().'.'.$user_image->extension();
            $user_image->move('user_images',$file_name);
            $user->image=$file_name;
        }
        $user->save();
        $courseIds =$request->input('course_id');
        $user->courses()->sync($courseIds);
        return redirect()->route('user.index')->with('success','The User has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        $user->delete();
        $user->courses()->forceDelete();
        $user->assignments()->forceDelete();
        return redirect()->route('user.index')->with('success','The User has been deleted successfully');
    }
}
