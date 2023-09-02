<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckAdmin;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        session()->forget('teacherUsers');
        session()->forget('studentUsers');
        return view('auth.login');
    }

    public function authentication(Request $request){
//        dd($request->toArray());
        $credentials = ['email'=>$request->email, 'password'=>$request->password];
        $role = $request->input('role');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($role == 'admin') {
                return redirect()->route('adminDashbord');
            } elseif ($role == 'teacher') {
                return redirect()->route('teacherDashbord');
            } elseif ($role == 'student' && $user->is_teacher == 0) {
                return redirect()->route('studentDashboard');
            } else {
                return redirect()->route('login')->withErrors(['error' => 'Invalid credentials']);
            }
        }
    }

    public function logout(){
        session()->forget('teacherUsers');
        session()->forget('studentUsers');
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('login');
    }

    public function show_register( ){
        return view('auth.register');
    }

    public function do_register(Request $request){
//        dd($request->toArray());
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'is_teacher'=>$request->is_teacher,
            'password'=>Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success','User is created Successfully');
    }

}
