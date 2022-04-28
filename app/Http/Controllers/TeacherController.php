<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
   
    public function index()
    {
      $data['teachers']=Teacher::all();
      $data['subjects']=Subject::all();
      return view("admin/manageTeacher",$data);
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        
       $request->validate([
            'teachername'=>'required',
            'subject_id'=>'required',
            'resume'=>'required',
            'contact'=>'required',
            'address'=>'required',
            'education'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required',
            'dob'=>'required',
            'monthlyfee'=>'required',
        ]);
        $user=new User();
        $user->name=$request->teachername;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->userType=1;
        $user->save();
        $user_id=$user->id;

        $data=new Teacher();
        $data->teachername=$request->teachername;
        $data->subject_id=$request->subject_id;
        $data->resume=$request->resume;
        $data->contact=$request->contact;
        $data->address=$request->address;
        $data->education=$request->education;
        $data->dob=$request->dob;
        $data->monthlyfee=$request->monthlyfee;
        $data->user_id=$user_id;
        $data->save();
       
        return redirect()->route("teacher.index");
    }
   
   public function teacherDashboard(){
        return view("teacher/dashboard");
   }
   public function login(){
       return view("teacher/login");
   }
    public function show(Teacher $teacher)
    {
        //
    }

    
    public function edit(Teacher $teacher)
    {
        //
    }

    
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

   
    public function destroy(Teacher $teacher)
    {
        //
    }
}
