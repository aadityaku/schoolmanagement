<?php

namespace App\Http\Controllers;

use App\Models\Clases;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Payment;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    
    public function index()
    {
        $data['students']=Student::all();
        $data['teachers']=Teacher::all();
        $data['student']=Student::withcount("studentclass")->where("status","1")->get();
        $data['class']=Clases::all();
        return view("admin/manageStudent",$data);
    }

    public function fetchStudent(Request $request,$id)

    {
        
        $data['students'] = Student::where([["studentname","LIKE",'%'.$request->student_id.'%'],['status',"1"],["clases_id",$id]])->orWhere([["roll",$request->student_id],['status',"1"],["clases_id",$id]])->orWhere([["contact","LIKE",'%'.$request->student_id.'%'],["status","1"],["clases_id",$id]])->get();
        return response()->json($data);
    }
    public function store(Request $request)
    {
        
        if($request->method()=="POST"){
           
            $request->validate([
                "studentname"=>"required",
                "dob"=>"required",
                "email"=>"required|email|unique:users,email",
                
                "age"=>"required",
                "education"=>"required",
                "fathername"=>"required",
                "gender"=>"required",
                "address"=>"required",
                "distance"=>"required",
                "password"=>"required",
                "contact"=>"required",
                
            ]);
            $user=new User();
            $user->name=$request->studentname;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->userType=3;
            $user->save();
            $user_id=$user->id;
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
            $data->user_id=$user_id;
            $data->save();
           return redirect()->route("home");
            
        }
        
        $data['clases']=Clases::all();
        return view("homepages/insert",$data);
       
    }
    public function viewPayment(){
        $data['students']=Student::all();
        $data['teachers']=Teacher::all();
        $data['student']=Student::withcount("studentclass")->where("status","1")->get();
        $data['class']=Clases::all();
        return view("admin/studentPayment",$data);
    }
    public function viewPaymentStudent($clases_id){
        $data['payment']=Payment::where([["clases_id",$clases_id],["status","due"]])->get();
        return view("admin/viewStudentPayment",$data);

    }
   static public function studentPayment(){
        $student=Student::where("status","1")->get();
        
        $now=new DateTime();
        foreach($student as $s){
            $dateofjoin=new DateTime($s->created_at);
            
             $start_year=$dateofjoin->format("Y");
             $nowyear=$now->format("Y");
             for($year=$start_year;$year <= $nowyear;$year++){
                if($start_year == $nowyear){
                    $start_month=$dateofjoin->format("m");
                    $end_month=$now->format("m");
                   
                }
                elseif($year == $start_year){
                    $start_month=$dateofjoin->format("m");
                    $end_month=12;
                   
                }
                elseif($year == $nowyear){
                    $start_month=01;
                    if($now->format("d") > $dateofjoin->format("d")){
                        $end_month=$now->format("m");
                       
                    }
                    else{
                       $end_month=$now->format("m") - 1;
                     
                    }
                   
                }
                else{
                    $start_month=01;
                    $end_month=12;
                    
                }
                for($month=$start_month;$month<=$end_month;$month++){
                    $result=new DateTime("$year-$month-".$dateofjoin->format("d"));
                    $newDate=$result->format("Y-m-d");
                    $student_id=$s->id;
                    $clases_id=$s->clases_id;
                    $class=Clases::where("id",$clases_id)->get();
                    $payment=Payment::where([["student_id",$student_id],["due_date",$newDate]])->get();
                   
                    if($payment->count() == 0){
                        $data=new Payment();
                        $data->due_date=$newDate;
                        foreach($class as $c){
                            $data->fee=$c->monthlyfee;
                        }
                        $data->clases_id=$clases_id;
                        $data->student_id=$student_id;
                        $data->save();
                    }

                }
             }

        }
    }
   
    public function studentDashboard(){
        
    }
    public function show(Student $student)
    {
        //
    }

    
    public function edit(Student $student)
    {
        $data['student']=$student;
        return view("admin/newAddmissionEdit",$data);
    }

    
    public function update(Request $request, Student $student)
    {
        //
    }

    
    public function destroy(Student $student)
    {
        //
    }
}
