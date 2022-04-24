<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['teachers']=Teacher::all();
      $data['subjects']=Subject::all();
      return view("admin/manageTeacher",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'teachername'=>'required',
            'subject_id'=>'required',
            'resume'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'education'=>'required',
            'dob'=>'required',
            'monthlyfee'=>'required',
        ]);
        $data=new Teacher();
        $data->teachername=$request->teachername;
        $data->subject_id=$request->subject_id;
        $data->resume=$request->resume;
        $data->contact=$request->contact;
        $data->address=$request->address;
        $data->education=$request->education;
        $data->dob=$request->dob;
        $data->monthlyfee=$request->monthlyfee;
        $data->save();
        return redirect()->route("teacher.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
