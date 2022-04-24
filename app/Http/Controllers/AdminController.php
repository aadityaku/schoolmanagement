<?php

namespace App\Http\Controllers;

use App\Models\Clases;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class AdminController extends Controller
{
    public function home(Request $request){
        $data['totalStudent']=Student::where("status","1")->count();
        $data['totalnewaddmission']=Student::where("status","0")->count();
        $data['totalTeacher']=Teacher::all()->count();
        $data['totalStaff']=Staff::all()->count();
        return view("admin/dashboard",$data);
    }
    public function newAddmission(){
        
            $data['newStudents']=Student::where("status","0")->get();
            return view("admin/newAdmission",$data);
        
    }

    public function approveAddmission(Request $req,$id){
        $data=Student::find($id);
        $class=Clases::where("id",$data->clases_id)->get();
        // $fee=$class->newadmissionfee;
        // $other=$class->bookrate;
        $data->roll=$req->roll;
        // $data->addmissionfee=$fee;
        // $data->others=$other;
        $data->status="1";
        $data->save();
        return redirect()->route("student.newaddmission");
    }
    public function approveAddmissionEdit(Request $req,$id){
        $data['id']=Student::find($id);
        return view("admin/newAddmissionEdit",$data);
    }

    public function viewStudent($clases_id){
        $data['students']=Student::where([['clases_id',$clases_id],["status","1"]])->get();
        return view("admin/viewStudent",$data);
    }
    
    
}
