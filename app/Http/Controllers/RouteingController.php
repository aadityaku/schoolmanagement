<?php

namespace App\Http\Controllers;

use App\Models\{Routeing,Student,Teacher,Clases, Subject};
use Illuminate\Http\Request;

class RouteingController extends Controller
{
    
    public function index()
    {
        $data['students']=Student::all();
        $data['teachers']=Teacher::all();
        $data['student']=Student::withcount("studentclass")->where("status","1")->get();
        $data['class']=Clases::all();
        return view("admin/manageRoutings",$data);
    }

    public function viewRouting($id){
        $data['routings']=Routeing::where("clases_id",$id)->get();
        $data['clases_id']=Clases::find($id);
        $data['subjects']=Subject::all();
        return view("admin/viewRouting",$data);
    }
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
       $data= $request->validate([
            'period'=>'required',
            'time'=>'required',
            'teacherrol'=>'required',
            'subject_id'=>'required',
            'clases_id'=>'required',
        ]);
        Routeing::create($data);
        return redirect()->back();
    }

    
    public function show(Routeing $routeing)
    {
        //
    }

   
    public function edit(Routeing $routeing)
    {
        //
    }

   
    public function update(Request $request, Routeing $routeing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Routeing  $routeing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Routeing $routeing)
    {
        //
    }
}
