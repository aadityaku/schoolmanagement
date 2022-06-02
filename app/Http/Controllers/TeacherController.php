<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Clases;
use App\Models\Routeing;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'linkedin'=>'required',
            'fblink'=>'required',
            'insta'=>'required',
            'image'=>'required',
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
        $data->fblink=$request->fblink;
        $data->linkedin=$request->linkedin;
        $data->insta=$request->insta;
        $fileName=$request->image->getClientOriginalName();
        $request->image->move(public_path("teacher"),$fileName);
        $data->image=$fileName;
        $data->monthlyfee=$request->monthlyfee;
        $data->user_id=$user_id;
        $data->save();
       
        return redirect()->route("teacher.index");
    }
   
   public function teacherDashboard(){
       $value=session('teacher');
       
       $user=User::where('email',$value)->first();
       $data['teachers']=Teacher::where('user_id',$user->id)->get();
        
       $teacher=Teacher::where('user_id',$user->id)->first();
       
       $data['clases_id']=Clases::where('teacher_id',$teacher->id)->first();
       $clases=Clases::where('teacher_id',$teacher->id)->first();
      
       AttendanceController::viewAttendance($clases->id);
      return view("teacher/dashboard",$data);
   }
   public function login(){
       return view("teacher/login");
   }

   public function viewRouting(Request $request){
           $value=session('teacher');
       
           $user=User::where('email',$value)->first();
        
           $teacher=Teacher::where('user_id',$user->id)->first();
           $subject=Subject::find($teacher->subject_id);
           
           $data['routings']=Routeing::where('subject_id',$subject->id)->get();
           return view("teacher/manageRouting",$data);
        
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
