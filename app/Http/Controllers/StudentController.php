<?php

namespace App\Http\Controllers;

use App\Models\Clases;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students']=Student::all();
        $data['teachers']=Teacher::all();
        $data['clases']=Clases::withcount("class")->get();
        
        return view("admin/manageStudent",$data);
    }

    public function fetchStudent(Request $request)
    {
        $data['students'] = Student::where("studentname","LIKE","%$request->name%")->get();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        
        if($request->method()=="POST"){
           
            // $request->validate([
            //     "studentname"=>"required",
            //     "dob"=>"required",
            //     "age"=>"required",
            //     "education"=>"required",
            //     "fathername"=>"required",
            //     "gender"=>"required",
            //     "address"=>"required",
            //     "distance"=>"required",
            //     "password"=>"required",
            //     "contact"=>"required",
            //     "email"=>"required",
            // ]);
           
            $data=new Student();
            
            $data->studentname=$request->studentname;
            $data->dob=$request->dob;
            $data->age=$request->age;
            $data->education=$request->education;
            $data->fathername=$request->fathername;
            $data->gender=$request->gender;
            $data->address=$request->address;
            $data->distance=$request->distance;
            $data->password=$request->password;
            $data->contact=$request->contact;
            $data->email=$request->email;
            $data->clases_id=$request->clases_id;
            $data->save();
           return redirect()->route("home");
            
        }
        
        $data['clases']=Clases::all();
        return view("homepages/insert",$data);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $data['student']=$student;
        return view("admin/newAddmissionEdit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
