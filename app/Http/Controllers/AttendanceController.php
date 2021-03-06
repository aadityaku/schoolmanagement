<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Clases;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
   
    public function index(Request $request)
    { 
        $data['students']=Student::all();
        $data['teachers']=Teacher::all();
        //$data['student']=Clases::withcount("student")->get(["studentname","id"]);
       
        $data['class']=Clases::withcount("student")->get();
        if($request->segment(1) =="admin"){
            return view("admin/manageAttendance",$data);
            
        }
       if($request->segment(1) == "teachers"){
           $value=session("teacher");
           $user=User::where('email',$value)->first();
           
           $teacher=Teacher::where('user_id',$user->id)->first();
        
           $data['clases_id']=Clases::where('teacher_id',$teacher->id)->first();
           $clases=Clases::where('teacher_id',$teacher->id)->first();
           $dates=Carbon::now()->format("Y-m-d");
           $data['attendances']=Attendance::where([['clases_id',$clases->id],['date',$dates]])->get();
           $this->viewAttendance($clases->id);
        return view("teacher/manageAttendance",$data);
        }
       
    }
   static  public function viewAttendance($clases_id){
        $students=Student::where([["clases_id",$clases_id],["status","1"]])->get();
        if($students){
            
        foreach($students as $s){
            $date=Carbon::now()->format("Y-m-d");
             $attendance=Attendance::where([["student_id",$s->id],['clases_id',$s->clases_id],["date",$date]])->get();
             if($attendance->count() > 0){
                //cheking queries
            
             }
             
             else{
                 
                 $data=new Attendance();
                 $data->student_id=$s->id;
                 $data->clases_id=$s->clases_id;
                 $data->date=$date;
                 $data->save();
             }   
         }
        }
        $dates=Carbon::now()->format("Y-m-d");
       
        $data['clases_id']=$clases_id;
        $data['attendances']=Attendance::where([["clases_id",$clases_id],["date",$dates]])->get();
        return view("admin/viewAttendance",$data); 
       }
       public function makeAttendanceForm(Request $req,$clases_id){
        if($req->method() == "POST"){
            $roll=$req->roll;
            
            $student=Student::where([["roll",$roll],["status","1"],['clases_id',$clases_id]])->first();
           if($student){
            $dates=Carbon::now()->format("Y-m-d");
            $attendance=Attendance::where([['student_id',$student->id],["status","absent"],["date",$dates]])->get();
            if($attendance->count() == 1){
                foreach($attendance as $a){
                
                    return $this->makeAttendance($clases_id,$a->id);
                }
            }
            else{
                return redirect()->back();
            }
           }
           else{
               return redirect()->back();
           }
           
        
        }
         
   }
    public function makeAttendance($clases_id,$id){
        $class=Clases::find($clases_id);
        $data=Attendance::where([['clases_id',$class->id],["id",$id]])->first();
        $data->status="persent";
        $data->save();
        return redirect()->back();

    }
   
   
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        
    }

   
    public function show(Attendance $attendance)
    {
        //
    }

   
    public function edit(Attendance $attendance)
    {
        //
    }

    
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

   
    public function destroy(Attendance $attendance)
    {
        //
    }
}
