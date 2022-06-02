<?php

namespace App\Http\Controllers;

use App\Models\Clases;
use App\Models\Homework;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['homework']=Homework::all();
        $data['clases']=Clases::all();
        $data['subjects']=Subject::all();
        
        return view("teacher/manageHomeWork",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

   
    public function store(Request $request)
    {
           $value=session("teacher");
           $user=User::where('email',$value)->first();
            $teachers=Teacher::where("user_id",$user->id)->first();
            
            $request->validate([
                'clases_id'=>'required',
                
                'hw'=>'required',
            ]);
            $data=new Homework();
            $data->clases_id=$request->clases_id;
            $data->subject_id=$teachers->subject_id;
            $data->teacher_id=$teachers->id;
            $data->hw=$request->hw;
            $data->save();
            return redirect()->back();
    }

    public function studentHomeWork(){
        $value=session("student");
        $user=User::where('email',$value)->first();
        $student=Student::where([['status',"1"],['user_id',$user->id]])->first();
        $data['homework']=[];
        $data['msg']=[];
        if($student){
            $data['homework']=Homework::where('clases_id',$student->clases_id)->get();
        
            return view("student/manageHomeWork",$data);
        }
        else{
            $data['msg']="You can Wait For apporeved by princepal";
            return view("student/manageHomeWork",$data);
        }
    }

    public function show(Homework $homework)
    {
        //
    }

   
    public function edit(Homework $homework)
    {
        //
    }

   
    public function update(Request $request, Homework $homework)
    {
        //
    }

   
    public function destroy(Homework $homework)
    {
        //
    }
}
