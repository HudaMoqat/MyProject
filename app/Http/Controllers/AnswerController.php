<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        $answers=Answer::where('status',$status)->get();
        if ($status==1) {
            return view('student/answers/index', compact('answers'));
        }else{
            $assignments=Assignment::doesntHave('answers')->get();
            return view('student/answers/unresolved-assignment', compact('assignments'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('student/answers/add-answer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $assignment_id)
    {
//        dd($assignment_id);
//        dd($request->toArray());
        $answer=new Answer();
        $answer_file=$request->file('answer');
        $file_name='answer for assignment'.$assignment_id.'.'.$answer_file->extension();
//        dd($answer_file);
        $answer_file->move('answer',$file_name);
        $answer->file_path=$file_name;
        $answer->status=1;
        $answer->user()->associate(Auth::user()->id);
        $answer->assignment()->associate($assignment_id);
        $answer->save();
        return back()->with('success','Your Answer Uploaded successfully');
    }

    public function download($filename)
    {
        $filePath = public_path('answer/' . $filename);

        if (file_exists($filePath)) {
            return Response::download($filePath, $filename);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }

//    public function delete($filename)
//    {
//        $filePath = public_path('answer/' . $filename);
//
//        if (File::exists($filePath)) {
//            File::delete($filePath);
//
//            return redirect()->route('answer.index',1)->with('success', 'File deleted successfully.');
//        } else {
//            return redirect()->back()->with('error', 'File not found.');
//        }
//    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $filePath = public_path('answer/' . $answer->filename);
        if (File::exists($filePath)) {
            File::delete($filePath);
            $answer->delete();
            return redirect()->route('answer.index',1)->with('success', 'File deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
    }
}
